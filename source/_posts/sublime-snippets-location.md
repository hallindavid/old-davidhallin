---
extends: _layouts.post
section: content
title: How to use Sublime Text Snippets and improve your workflow
date: 2020-03-26
featured: true
description: Why sublime snippets are great, how to make them, and how to edit them
categories: [general]
---

## What is a snippet?

If you've never played with Sublime Text, it's a fantastic editor and feels so much faster than most of the other editors out there today.  It does cost some money up front, but there is no monthly/annual subscription that you need.  One of I think it's most powerful features is snippets.  

When I first started using snippets, the way I understood them was like a multi-copy paste function.  Instead of having just one thing copied at a time, you could have a bunch.  So when there is a repeatable piece of code, you make a snippet and then just pump them out, but the power of snippets in Sublime Text runs deeper than that.  The super-feature is the tabbed selections in a snippet.  

Here is an example of a snippet I use all the time when I'm designing forms in Laravel with Bootstrap.
```
<snippet>
    <content><![CDATA[
<div class="form-group row">
    <label for="${1}" class="col-sm-2 col-form-label">${2}</label>
    <div class="col-sm-10">
        <input  class="form-control @error('${1}') is-valid @else is-invalid @enderror" 
                type="text" 
                id="${1}" name="${1}"
                value="{{ old('${1}') }}">
        @error('${1}')
        <div class="invalid-feedback">
            {{ \$message }}
        </div>
        @enderror
    </div>
</div>
]]></content>
    <tabTrigger>lbinput</tabTrigger>
</snippet>
```

So - I'd use my "Laravel Bootstrap Input" snippet - `lbinput` and automatically, all the fields where there is a `${1}` are highlighted, meaning I can type that string in just once to fill all of them in.

<img src="/assets/images/post-3/lbinput.gif" class="w-full">

This is cool for so many reasons

* You just wrote over 10 lines of code with 8 keystrokes
* Perfect accuracy - because you had the label-for, input id, value, and name, plus the error handling methods all in the same selection, they're all going to be the exact same text.  So feel free to use `frist_name` - it'll still work! (at least on the front end)
* More consistency - If you're looping through many of these input fields, sometimes you can forget classes to apply or neglect error handling on certain fields. 

Awesome right?

## How do I make the snippets?

In Sublime all you have to do is go to Tools -> Developer -> New Snippet.

This will open a new snippet template and give you some areas to fill in the blank.

Once you're finished, you have to save it with a `.sublime-snippet` extension.  Then you should be good to go.


## How do I edit a snippet?

So if you've just created your first snippet, and saved it properly, and it works, but now you need to edit it, you may be wondering where you actually just saved that file to because it's not in your home directory.

This path for mine are here:
```
~/Library/Application Support/Sublime Text 3/ Packages/User/snippets/
```

It's hard to that folder in finder, so you should use the Sublime CLI tool (see <a href="https://www.sublimetext.com/docs/3/osx_command_line.html">here</a>) so you're able to do something like this
```
subl ~/Library/Application\ Support/Sublime\ Text\ 3/Packages/User
```

I do this enough that I made an alias in my .zshrc file
```
alias sublsnippets="subl ~/Library/Application\ Support/Sublime\ Text\ 3/Packages/User"
```
