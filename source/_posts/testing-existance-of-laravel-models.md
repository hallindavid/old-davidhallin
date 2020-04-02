---
extends: _layouts.post
section: content
title: Testing the Existance of Laravel Models
date: 2020-04-02
description: Coming from Codeigniter, using Eloquent to test for results can be different
categories: [php]
---

This is something I had to google so many times when I got started with Laravel, so I hope others find it helpful.

In Codeigniter, there isn't really any ORM, so if you're looking to check if something exists in your database, you'd check out the number of rows returned eg.

```php
$postExists = ( $this->db->query("  Select COUNT(*) as CNT 
                                    from posts 
                                    where user_id = ?",  array(10))->row()->CNT > 0);
if ($postExists) {
    //proceed with code
}
```

Or with query codeigniter query builder
```php
$this->db->where('user_id', 10);
if ($this->db->count_all_results('posts') > 0) {
    //post exists, proceed
}
```
## The Laravel Model Exists Check

Now when I went from Codeigniter to Laravel this was a total change of mindset for me.  The manipulators that Laravel offers for this are huge.

To do the same thing as above, the easiest way to use Eloquent (without already having the user model as a variable) is to do something like this
```php
use App\Post;
...
if (Post::where('user_id',10)->exists()) {
    //post exists, proceed
}
```

But when you start to look at the use cases for testing existance, there are a huge variety that are super helpful.

## Throw Error when the model doesn't exist
```php
use App\Post;
...
$post = Post::where('user_id',10)->firstOrFail();
```

then you may want to handle the error in a custom way - like redirecting the user, or Logging the error
```php
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
...
try {
$post = Post::where('user_id', 10)->firstorFail();
} catch(ModelNotFoundException $e) {
    //Log the error, redirect the user etc.
}
```

## Create the model if it doesn't exist
Sometimes you want to basically create an empty/default model if none exists.
```php
use App\Post;
...
$post = Post::firstOrCreate(['user_id'=>10]);
```
This way requires that the user_id is a fillable field in the posts model, if you're using the eloquent relationship and don't want to make user_id a fillable field, you would do something like this.
```php
use App\Post;
...
$post = User::find(10)->posts()->firstOrCreate([]);
```

## Alternative existance checks that work

```php
use App\Post;
...

if (Post::where('user_id',10)->count() > 0) {
    //Post exists
}

if (Post::where('user_id', 10)->first() !== NULL) {
    //Post exists
}
```

That's all - Hopefully it helps someone!