---
extends: _layouts.post
section: content
title: Javascript confirm before calling wire:click in Laravel Livewire
date: 2020-08-08
description: Confirm an action with javascript before calling the livewire php function
categories: [general]
---

First off - I should say - this is taken from <a href="https://github.com/livewire/livewire/issues/366">this issue conversation on github</a> - particularly from <a href="https://github.com/fra000">fra000</a>'s comment on November 14th, 2019

When building any sort of database-driven app, I'll want to have a Javascript Confirmation before actually performing an action for things like deleting something, or modifying something which performs a significant change.

With Livewire, you call the PHP function easily with something like this
```html
<button wire:click="delete_object">DELETE!</button>
```

But that will call the delete code right away, so rather than doing that, we want to have something that prompts the user to say "Are you sure?" or something along those lines.

<img src="/assets/images/post-10/alert-preview.png" />

And here is how - 
```html
<button onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" 
		wire:click="delete_object">DELETE!</button>
```

