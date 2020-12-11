---
extends: _layouts.post
section: content
title: Testing Upsert vs update case statements in Laravel & MySql
date: 2020-12-10
description: After my last post, I decided to test another idea that came out of conversation about it.
categories: [php]
---

First off - if you've not read the post <a href="/blog/using-upsert-in-laravel-8/">using Model::Upsert in laravel 8</a>, check that out before you read this one.  It's kind of the start of this experiment.

One of the comments that came up in conversation about this post was, rather than using the insert into, and on duplicate failure, why don't you a cased update query like the following

```mysql
update items
   set sort_order = CASE 
   						when id = [some_id_here] then 1
						when id = [some_id_here] then 2
						when id = [some_id_here] then 3
						when id = [some_id_here] then 4
						when id = [some_id_here] then 5
					END
  where ids in ([all_your_ids_here])
```

which makes a lot of sense.  So I thought that this is actually something that's worth testing, and if it's more efficient, there are probably a lot of people who have sort orders on models in their apps, so if it is a big improvement, then maybe it would be worth putting in the time to making a PR on the laravel framework.

So I spun up <a href="https://github.com/hallindavid/laravel-upsert-test">a laravel app to test it out</a>.




### laravel-upsert-test

The package itself basically is a Laravel/Livewire app, it has a model called TestTask, which has a sort order.

The app is super easy to spin up, so go ahead and clone it, there are some brief instructions in the readme file.


### the tests

I tested 4 different methods for updating sort order on groups of tasks


#### test 1

this takes the new ordered array, loops through and updates each model individually.

```php
foreach ($new_order as $order) {
	TestTask::find($order['id'])->update(['sort_order' => $order['sort_order']]);
}
```


#### test 2

this test looks through the new ordered array, and checks the current collection, and only performs updates on records that have changed

```php
foreach ($new_order as $order) {
	if ($items->firstWhere('id', $order['id'])->sort_order !== $order['sort_order']) {
		TestTask::find($order['id'])->update(['sort_order' => $order['sort_order']]);
	}
}
```

#### test 3

this test uses the new upsert functionality in laravel 8

```php
TestTask::upsert($new_order, ['id'], ['sort_order']);
```

#### test 4

this test creates a giant *UNSANITZED* database update query in this format
```mysql
update test_tasks
set sort_order = CASE WHEN id = ? then 1 WHEN id = ? then 2 WHEN id = ? then 3 END
```

the code for this looks like this.

```php
$ids = [];

$cases = '';
foreach ($new_order as $task) {
	$ids[] = $task['id'];
	$cases .= sprintf(' WHEN id = %d THEN %d ', $task['id'], $task['sort_order']);
}
$build_query = sprintf("CASE %s END", $cases);

TestTask::query()->whereIn('id', $ids)->update([
	'sort_order' => DB::raw($build_query)
]);
```







### my testing procedure

- I ran this application locally on my mac
- I started each batch by a delete (via truncate) and seeding the # of records
- I would let the test complete, wait ~ 2 seconds, then run it again.
- I ran each test 10 times, per data set, and pasted the average in here

### my results


<table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
  <tr>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"># Records</th>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Test 1</th>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Test 2</th>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Test 3</th>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Test 4</th>
  </tr>
</thead>
<tbody>
    <tr class="bg-white">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">100</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">114.5 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">154.3 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">10.1 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">6.8 ms</td>
  </tr>
    <tr class="bg-white">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">250</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">266.2 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">524.3 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">11 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">10.3 ms</td>
  </tr>
    <tr class="bg-white">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">500</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">531.8 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1609.8 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">20.5 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">18.9 ms</td>
  </tr>
    <tr class="bg-white">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1000</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1116.8 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5210 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">32.6 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">38.4 ms</td>
  </tr>
    <tr class="bg-white">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2500</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2626.5 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">timeout</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">79.5 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">146.5 ms</td>
  </tr>
    <tr class="bg-white">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5000</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5263 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">timeout</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">153 ms</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">524.5 ms</td>
  </tr>
</tbody>
</table>


### my conclusion

So - all in all, I thought early on, that `test4` was going to be the clear winner for larger data sets, because it wouldn't be trying to perform an insert, then update, but it turns out that `test3` (the upsert) is actually super amazingly performant.

one of the things that comes to mind is now that AWS is billing per ms on for Lambda instances, queries like this mean massive cost savings for large-scale apps.


Thanks for reading!