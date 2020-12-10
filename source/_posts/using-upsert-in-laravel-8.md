---
extends: _layouts.post
section: content
title: using Model::Upsert in laravel 8
date: 2020-12-10
description: a super interesting way to run a single query, which updates many records in a database
categories: [php]
---

Recently - I asked this question on the <a href="https://laracasts.com/discuss/channels/general-discussion/question-whats-the-most-efficient-way-to-update-a-database-with-new-sort-orders?page=1#reply=672246">laracasts discussion board</a> and I got an answer that surpassed my expectations.

### TLDR

You can bulk update the sort order of items in laravel using the `Upsert` function (only in Laravel 8)

```php
$ordered_array = [
	[
		'id'=>1,
		'sort_order'=>1,
	],
	[
		'id'=>7,
		'sort_order'=>2,
	],
	...
];

Item::upsert($ordered_array, ['id'], ['sort_order']);
```

There are a few hiccups/errors that I ran into while using it, which I go into below.



### the problem

I have a laravel model called `item`, which in the database looks like this.

```php
Schema::create('items', function (Blueprint $table) {
	$table->id();
	$table->foreignId('team_id'); //using laravel/jetstream
	$table->string('name');
	$table->date('due_date');
	$table->unsignedSmallInteger('sort_order')->default(1)->index();
});
```

The project that I'm working on has drag-and-drop sorting capabilities using <a href="https://github.com/Shopify/draggable/tree/master/src/Sortable">Shopify's sortable package</a>.    So basically a user is able to re-order these items by click/drag, and then the front-end sends the new order as an array to my backend - which looks like this

```php
[
	[
		'order'=>1,
		'value'=>'id of first item',
	],
	[
		'order'=>2,
		'value'=>'id of second item',
	],
	...
]
```

So when the user changes the order, you have a few options on how update the sort_order column to reflect the new order.

### idea 1

if the list is small, or it's not a heavily used application, you could get by by doing an update statement for each item.

```php
foreach($new_order as $li) {
	$team->items()->find($li['value'])->update(['sort_order'=>$li['order']]);
}
```

Basically this will run 1 database query per item in the list, every time the user moves something - so if the user is updating a lot of things at once, you end up with a huge amount of queries.

eg.

```sql
update items set sort_order = 1 where team_id = 7 and id = 12;
update items set sort_order = 2 where team_id = 7 and id = 13;
update items set sort_order = 3 where team_id = 7 and id = 17;
update items set sort_order = 4 where team_id = 7 and id = 14;
update items set sort_order = 5 where team_id = 7 and id = 19;
update items set sort_order = 6 where team_id = 7 and id = 21;
update items set sort_order = 7 where team_id = 7 and id = 27;
```

This is fine for small lists where it's not a big deal to do a few, but in production, this kind of design pattern is the path to having all sorts of database connection/locks/issues/pain.


### idea 2

Now keep in mind that in the first one, you may be updating a bunch of items that don't actually need to get updated - eg.  If you move something from position 5 to 6, then really there are 2 records that actually are getting new values for sort_order, the rest are getting updated with their existing value.


This idea was shifting some of that database work to the php side, which for computation and comparison is usually a bad choice, but if your user sorts 10 times, one right after the other, you can quickly generate over a thousand queries if you have a large list, so this was how to combat that.


```php
$items = $list->items()->get();

foreach($new_order as $li) {
  if ($items->firstWhere('id', $li['value'])->sort_order !== $li['order']) {
    Item::find($li['value'])->update(['sort_order'=>$li['order']]);
  }
}
```

In this option we start by getting the existing collection of items.

Then we loop through the new order, and check the sort order in the existing collection.  If there was a change, then we perform the update.

In large lists, this will take longer.  It's important to note that MySQL, or really any RDBMS will be far better at these kind of comparisons than PHP will.  So this method will be sluggish in production.


These ideas are what I posted on the laracasts discussion board, and <a href="https://laracasts.com/@rodrigo.pedra">Rodrigo Pedra</a> was kind enough to point out that in Laravel 8, we now have an `upsert` function.  Admittedly, I'd never heard of `Upsert` prior to this, so I checked out the docs and it looked easy enough.

#### upsert attempt 1

```php
$team_id = auth()->user()->currentTeam->id;

Item::upsert(collect($new_order)->map(function($item) use($team_id) {
  return [
    'id'=>$item['value'],
    'team_id'=>$team_id,
    'sort_order'=>$item['order'],
  ];
})->toArray(), ['id','team_id'], ['sort_order']);
```


This kept on shooting back an error message
```
the name column does not have a default value
```

So I dug a bit deeper and looked at the query it was actually attempting - after looking at the query in telescope, I came up with this.

```sql
INSERT into items (id, team_id, sort_order, created_at, updated_at) VALUES 
    ('id_for_item_1', 1, '2020-12-10 13:30:00', '2020-12-10 13:30:00'), 
    ('id_for_item_2', 2, '2020-12-10 13:30:00', '2020-12-10 13:30:00'), 
    ('id_for_item_3', 3, '2020-12-10 13:30:00', '2020-12-10 13:30:00') 
on duplicate key
update sort_order = values(sort_order), updated_at = values(updated_at)
```


`Upsert` actually formats the query as an insert statement, and the update part of it is the callback for if there is a duplicate key.

So the error I was getting was validation for the insert statement before executing, so the non-nullables columns without default values break the `upsert` function.

So, in my case, I was able to get away with this.  I set empty/fake values for the non-nullable columns, knowing full well that because of the `id` field it was definitely going to kick back with a duplicate key exception, and then ran it again as follows.

```php
$team_id = auth()->user()->currentTeam->id;

Item::upsert(collect($new_order)->map(function($item) use($team_id) {
  return [
    'id'=>$item['value'],
    'name'=>'',
    'due_date'=>now(),
    'team_id'=>$team_id,
    'sort_order'=>$item['order'],
  ];
})->toArray(), ['id','team_id'], ['sort_order']);
```

This worked - and is a single query, instead of 100 different queries.  in terms of performance, this is snappy.  It uses the sql comparisons instead of php, and runs ridiculously fast, even for 100+ items getting updates.

So all in all - way better than what I was expecting when I asked the question, and this `upsert` is one of these random functions that can you get by using Laravel and never know about, but it's mind-blowing how much of an impact it can make if you need it.

Thanks all, hope you guys find this useful.
