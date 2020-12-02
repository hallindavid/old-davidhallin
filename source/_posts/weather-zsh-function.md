---
extends: _layouts.post
section: content
title: the weather zsh terminal function
date: 2020-12-02
description: get a weather report in terminal
featured: true
categories: [general]
---

While I was kind of digging through my configuration files to make the post <a href="/blog/what-i-use-2020">what i use</a>, I went down a bit of a rabbit hole for my zsh configuration.

I had a bunch of aliases, functions, and plugins in my configuration that I didn't use anymore, and didn't need really, so I started to go through them and began looking into which ones were still useful vs which ones I could remove from my .zshrc file.

During that process I stumbled upon the <a href="https://github.com/freekmurze/dotfiles">freekmurze/dotfiles</a> repo, and I found this function that freek is sourcing in his .zshrc

```shell
function weather() {
   city="$1"

   if [ -z "$city" ]; then
      city="Antwerp"
   fi

   eval "curl http://wttr.in/${city}"
}
```

So this function if you open up your terminal, you simply type `weather` and the weather report comes up beautifully.

I adjusted it slightly so it runs for Peterborough instead of Antwerp, but here is the output.

<img src="/assets/images/post-15/weather.png" class="mx-auto" width="80%"/>

