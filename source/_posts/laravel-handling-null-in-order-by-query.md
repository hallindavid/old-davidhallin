---
extends: _layouts.post
section: content
title: Handling null values in an 'order by' query with Laravel Eloquent (Laravel Beginner, mysql + postgres compatible)
date: 2020-06-02
description: Sometimes you want nulls first, other times you want them last
featured: true
categories: [php]
---

In Laravel, there is a precedent to use a nullable datetime/timestamp field similar to a boolean value, for example things like the field `deleted_at` which is automatically added to your eloquent models when you use soft_deletes.

When you're working with that within that frame, sometimes you're going to want handle these date times in different ways.

Say for instance, the field `email_verified_at` in the `User` model which is pretty default/standard in a Laravel installation.

```php
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');            
            $table->rememberToken();
            $table->timestamps();
        });
    }
```

Then you have an administration page or report which needs to show all the users, and include their status.  You would probably do something like this:

```php
    return App\User::orderBy('email_verified_at','ASC')->get()->toArray();
```
 Here is a subset of the sample results from this query from a super-basic factory user loaded laravel project.
 ```php
[
       "id" => 38,
       "name" => "Laila Jacobi",
       "email" => "spinka.florence@example.com",
       "email_verified_at" => null,
       "created_at" => "2020-06-02T12:40:32.000000Z",
       "updated_at" => "2020-06-02T12:40:32.000000Z",
     ],
     [
       "id" => 45,
       "name" => "Carmelo Bernhard",
       "email" => "gwolf@example.org",
       "email_verified_at" => null,
       "created_at" => "2020-06-02T12:40:32.000000Z",
       "updated_at" => "2020-06-02T12:40:32.000000Z",
     ],
     [
       "id" => 2,
       "name" => "Dr. Anais Graham",
       "email" => "adrian.feest@example.net",
       "email_verified_at" => "2020-06-02T12:40:32.000000Z",
       "created_at" => "2020-06-02T12:40:32.000000Z",
       "updated_at" => "2020-06-02T12:40:32.000000Z",
     ],
     [
       "id" => 3,
       "name" => "Norris Kuhic",
       "email" => "iswaniawski@example.net",
       "email_verified_at" => "2020-06-02T12:40:32.000000Z",
       "created_at" => "2020-06-02T12:40:32.000000Z",
       "updated_at" => "2020-06-02T12:40:32.000000Z",
     ],
     [
       "id" => 4,
       "name" => "Curt Anderson DVM",
       "email" => "uschmeler@example.net",
       "email_verified_at" => "2020-06-02T12:40:32.000000Z",
       "created_at" => "2020-06-02T12:40:32.000000Z",
       "updated_at" => "2020-06-02T12:40:32.000000Z",
     ],
```
You can see the people who haven't verified their email come first in this query.
Say you want them at the end though - active users first is a common thing that people want to see, so logically: 
```php
return App\User::orderBy('email_verified_at','DESC')->get()->toArray();
```

This works - now the results have all the ```"email_verified_at" => null,``` at the very end, but now the order has your most recently verified users at the top.

So if we wanted a list of our users who have been verified the longest to shortest, where the unverified users would obviously be at the end, we'd have to do this a bit differently.  This also get's complicated when you are trying to stay database agnostic for MySQL and Postgres. 

## Solution

```php
    // email_verified_at oldest to newest, with nulls last
    App\User::orderByRaw("CASE WHEN email_verified_at IS NULL THEN 0 ELSE 1 END DESC")->orderBy('email_verified_at','DESC')->get()->toArray();

    // email_verified_at newest to oldest, with nulls last
    App\User::orderByRaw("CASE WHEN email_verified_at IS NULL THEN 0 ELSE 1 END DESC")->orderBy('email_verified_at', 'ASC')->get()->toArray();

    // email_verified_at newest to oldest, with nulls first
    App\User::orderByRaw("CASE WHEN email_verified_at IS NULL THEN 0 ELSE 1 END ASC")->orderBy('email_verified_at', 'DESC')->get()->toArray();

    // email_verified_at newest to oldest, with nulls first
    App\User::orderByRaw("CASE WHEN email_verified_at IS NULL THEN 0 ELSE 1 END ASC")->orderBy('email_verified_at', 'ASC')->get()->toArray();
```

By keeping the null handling in a separate orderBy statement, it allows you to order the nulls which ever way you like, and continue sorting or using query builder to build out your query.
 