---
extends: _layouts.post
section: content
title: New Update to Open Source Repository - Manny
date: 2020-09-24
description: I added a new feature to Manny, as well as changed the functionality a bit of the strip function
featured: false
categories: [opensource,php]
---

If you haven't heard of Manny, it's an open source package I created in March of 2020.

Repo: <a href="https://github.com/hallindavid/manny">github.com/hallindavid/manny</a><br />
Blog post explaining what it is: <a href="/blog/livewire-masks-with-manny">Livewire Masks With Manny</a><br />
Project page: <a href="/projects/manny">Manny</a>

I made a PR with 2 changes that popped up in a project I was working on.

####Updated Mask to not add on additional characters after we've run out of characters.

The mask function is typically used like this

```php
$postal_code = Manny::mask($user_input, 'A1A 1A1');
```
This first removes all non-alphanumeric characters from the `$user_input` variable, and then adds them to the pattern string - in this case `A1A 1A1`.

```php
Manny::mask('#####M !@#!@# 4 A', 'A1A 1A1);
//returns "M4A "
```

This is find behavior for user inputs when the string is expected to be finished - like in the postal code example above, but when using a mask for an optionally filled mask, like a phone number with extension like this

```php
Manny::mask('123-123-1234', '111-111-1111 ext. 111111111');
// returns "123-123-1234 ext. "
```

If the user inputs a phone number without an extension, I wanted it to not append the trailing mask pattern - so the update changes that to return this

```php
Manny::mask('1231231234', '111-111-1111 ext. 111111111');
// returns "123-123-1234"
```

and then the moment the user enters one more key,
```php
Manny::mask('12312312345', '111-111-1111 ext. 111111111');
// returns "123-123-1234 ext. 5"
```

#####Added the colon(:) character as an option for the stripper function
This one came up because of a project I'm working on where we want to allow for special searching via tags, like many apps do these days.

For my use case, when you're using the search box, it starts as an indexed search for invoices - it will grab all records where the search text is included in any of the text fields.

But when a user wants to search for a specific invoice using an invoice number - if that invoice number is 950 - then we actually see numerous results appear, one of them is invoice 950, but others have phone numbers with 950 in them, or 950 is mentioned somewhere in the fields.

So the solution is to check the search string for specific tags, in our case it's `inv:xxx`

```php
$search_string = "inv:950 I shouldn't use a search string that hasn't been cleansed";
$cleansed_search_string = Manny::stripper($search_string, ['alpha','num','space', 'colon']);
// will be "inv:950 i shouldnt use a search string that hasnt been cleansed"
```

Now that I have cleansed the string, I can iterate over the search body and generate results something like this

```php
$invoice_search = null;
$search_parts = explode(' ', $cleansed_search_string);
$remaining_search_parts = [];

foreach($search_parts as $search_part) {
	if (substr($search_part, 0, 4) == 'inv:') {
		$invoice_search = substr($search_part, 4);
	} else {
		$remaining_search_parts[] = $search_part;
	}
}

$remaining_search = implode(' ', $remaining_search_parts);

$invoices = Invoices::when($invoice_search !== null, function(Builder $query) use ($invoice_search) {
	$query->where('invoice_number', $invoice_search);
})->when((strlen($remaining_search) > 0), function(Builder $query) use ($remaining_search) {
	$query->where('invoice_body', 'LIKE', '%' . $remaining_search . '%');
}->get();
```

So - those are the updates to Manny!