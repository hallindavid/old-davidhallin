---
extends: _layouts.post
section: content
title: My first open source package
date: 2020-03-29
description: I just released my first open-source package
categories: [opensource,php]
---

So the other day I was working with <a href="https://calebporzio.com/">Caleb Porzio</a>'s <a href="https://laravel-livewire.com/">Livewire</a> package, and I ran into a unique situation - atleast for me.

In my normal php builds, when you fill out a form like this

<img src="/assets/images/first-open-source-package/sample-form.png" />

You would use some javascript library to mask the input on the phone number field like <a href="https://nosir.github.io/cleave.js/">Cleave</a>.  Then when the user would submit the form, I'd remove all formatting characters with regex 
```
$cleansed_phone = preg_replace('/[^0-9]/', '', $posted_phone);
```
and format into the desired format - like E.164 if using it for SMS, or if it was a more CRM-like application, storing it like `888-888-8888` so that people can easily search for it.

In Livewire though, the data is process in PHP - which is super interesting.  Now - I'm sure that there's probably a way to do this with Javascript on top of Livewire, but Livewire already syncs the values accross and makes it super easy to due PHP functions on the data models and send them back to the page.  So in a way, we use Livewire and PHP to build our markup function.

At first I thought to just make the regex calls within the updated function like this:
```
public function updated($field)
{
	if ($field == 'phone')
	{
		$newPhone = preg_replace('/[^0-9]/', '', $this->phone);
		$this->phone = '(' . substr($newPhone, 0,3) . 
						. (strlen($newPhone) > 3 ? ') ' . substr($newPhone,3,3) : '')
						. (strlen($newPhone) > 6 ? '-' . substr($newPhone,6,4) : '');
	}
}
```
And make no mistake - that will work, but it's a bit of a pain.  I have all this functionality pre-done for me in jQuery & Vue.js and I'm really liking Livewire so far, so I thought I'd make a package of it.

So - here's the package: <a target="_blank()" href="https://github.com/hallindavid/phonehelper">hallindavid/phonehelper</a>.  installable via composer, and Laravel auto-recognizes the ServiceProvider & Alias so when you're wanting to mask phone inputs (just form Canada / US) for the example above, it looks like this

```
public function updated($field)
{
	if ($field == 'phone')
	{
		$this->phone = PhoneHelper::format($this->phone);
	}
}
```

It's also super easy to add your own formats by using a configuration file, but it ships with 10 formats by default - checkout the readme for better examples.