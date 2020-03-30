---
extends: _layouts.post
section: content
title: Masking Livewire inputs with manny
date: 2020-03-30
description: How to create masks for livewire inputs using hallindavid/manny package
categories: [php]
---

This post expects you to be comfy with Laravel development, and a bit of Livewire as well - although I do go through setting up livewire.

### Creating the Project

So let's start off by creating our project and stepping into it.

```sh
laravel new livewiremask
cd livewiremask
```
### Pull in scaffolding and livewire

Let's pull in Livewire and also pull in the ui front-end scaffolding - just so we don't have to build much in terms of a theme.

```sh
composer require livewire/livewire
composer require laravel/ui 
php artisan ui bootstrap --auth
npm install && npm run dev
```

Although we really don't need the the auth - I just want to steal the register form for this example.

At this point, you'll need to set up the dev environment for however you use Laravel normally.  For me, it's valet.

```
valet link
```

open your browser window and check out what we've done so far.  You should be greeted with the laravel default landing page
<img src="/assets/images/livewire-masks-with-manny/livewire-mask-start.png" class="mx-auto w-50"/>

### Setup Livewire Component
So the first thing we need to do is add the livewire assets into the layout.

So let's go to `resources/view/layouts/app.blade.php` and add in our styles + scripts

styles in the head
```html
	...
	<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    //add this line
    <livewire:styles>
</head>
```
scripts just before the end of the body tag
```html
		...
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    //add this line
    <livewire:scripts>
</body>
```
### Create the Livewire Component
Next up we're going to create the livewire component, and create a route to serve the livewire component.
```php
php artisan make:livewire maskedform
```
This should have created 2 new files for you.  
`app/Http/Livewire/MaskedForm.php` This is the component code, and <br />
`resources/views/livewire/maskedform.blade.php` this is the component view.

Let's also create the view `livewireform.blade.php` in the `resources/views` folder.  This view will hold our livewire component for us
```html
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                	<livewire:maskedform>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```




Let's create a route to the livewire component by adding this line into `routes/web.php`
```php
Route::get('/maskedform', function() {
	return view ('livewireform');
});
```
and finally let's add this code to to our livewire component view
```html
<form>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Phone</label>
        <div class="col-md-6">
            <input type="text" class="form-control" autofocus>
        </div>
    </div>
</form>
```

Now if you browse to the route, (with valet, mine is `livewiremask.test/maskedform` ) you should see this

<img src="/assets/images/livewire-masks-with-manny/phone-view.png"/>

Ok - so now we can start defining the different variables we want to play with

### Defining the Livewire Variables
Let's jump into livewire code, `app/Http/Livewire/Maskedform.php`.
It should look like this:
```php
<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Maskedform extends Component
{
    public function render()
    {
        return view('livewire.maskedform');
    }
}
```
The first thing we want to do is bind the phone field we created in the view to a variable in the code.

```
class Maskedform extends Component
{
	public $phone;

    public function updated($field)
   	{
   		if ($field == 'phone') {
   			//this is where we will detect any changes to the phone field.
   		}
    }
    ...
```

and in the livewire view, we are going to bind it by adding the `wire:model="phone"` to the input.
```html
<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
    <div class="col-md-6">
        <input wire:model="phone" id="phone" type="text" class="form-control" autofocus>
    </div>
</div>
```

### Pull in Manny - start masking
now it's time to pull in Manny - (manny is short for manipulator)
```sh
composer require hallindavid/manny
```
The docs for Manny are available here: <a href="https://github.com/hallindavid/manny">github.com/hallindavid/manny</a> there are quite a few little functions that are super helpful with Livewire.


The first mask we'll play with is, just to eliminate all non-numeric characters.  You can do through using `preg_replace` with regular expressions, but Manny has a function called `Stripper` which can also do this for us without the need for remembering how to write regular expressions.

In our `app/Http/Livewire/Maskedform.php` file, let's update our code
```php
use Livewire\Component;
use Manny;

class Maskedform extends Component
{
	public $phone;

	public function updated($field)
	{
		if ($field == 'phone')
		{
			$this->phone = Manny::stripper($this->phone, ['num']);
		}
	}


    public function render()
    ...
```

Now if you go back to your browser and play with the phone field, you should see this happening:
<img src="/assets/images/livewire-masks-with-manny/manny-stripper-num-mask.gif"/>

Well that's great for stripping all the non-numeric characters out, but what if you want to format it in a specific way?  In Canada/US we have 10 digit phone numbers in most places, and usually people don't include the country code on the number.  So you see phone numbers that look like this: `(987) 123-4567` or `987-123-4567`.

Let's change the Component code to this:
```php 
if ($field == 'phone')
{
	$this->phone = Manny::mask($this->phone, "(111) 111-1111");
}
```

go back to your page, and you should be see this now:
<img src="/assets/images/livewire-masks-with-manny/manny-mask.gif"/>

For more advanced phone numbers there is actually a class - `Manny\Phone` that you can extend to do more advanced phone number support - with extensions and other special formatting.

What about other types of fields?
Another great example of using the Manny::mask function is for canadian postal codes.  Canadian postal codes are 2 groups of 3 characters, each group alternates between alphbetical and numeric, so like this:  A1A 1A1 

In the view, let's create a seperate input for the postal code.
```html
<form>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Phone</label>
        <div class="col-md-6">
            <input wire:model="phone" type="text" class="form-control" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Postal Code</label>
        <div class="col-md-6">
            <input wire:model="postal" type="text" class="form-control" autofocus>
        </div>
    </div>
</form>
```

and let's also make the variable in the code
```php
public $phone;
	public $postal;

	public function updated($field)
	{
		if ($field == 'postal')
		{
			$this->postal = strtoupper(Manny::mask($this->postal, "A1A 1A1"));
		}
		...
```
Go ahead and reload - you should see this now.
<img src="/assets/images/livewire-masks-with-manny/manny-mask-postal.gif"/>


The mask function is pretty nifty for doing a lot of different patterns.
some other ones to try would be 
```php
$this->birthday = Manny::mask($this->birthday, "11/11/1111");
$this->date = Manny::mask($this->date, "1111-11-11");
$this->time = Manny::mask($this->time, "11:11");
```

### Note on masking with Livewire
Livewire is very fast, but due to the fact that is being sent through ajax, processed in PHP then returned in javascript, the default debounce may not be good enough for some masks.  Some tips to deal with this could be:

Increase the debounce
```html
<input type="text" wire:model.debounce.500ms="phone">
```

Make the inputs lazy (masks after the user has left the input field)
```html
<input type="text" wire:model.lazy="phone">
```

### Source Code
To view the source code from this example go to the GitHub repo
<a href="https://github.com/hallindavid/livewire-masks-with-manny">hallindavid/livewire-masks-with-manny</a>


