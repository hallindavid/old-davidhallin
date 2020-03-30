---
extends: _layouts.post
section: content
title: The importance of being a part of a dev community
date: 2020-03-30
description: I just got started building open source software.  Why did it take me this long?
categories: [opensource,php]
---

** Note - this is a non-technical post.  If you're here for the techno-goodies, this is safe to skip. **

I don't mean "part of a dev community" in a weird cliquey way - when I say being part of a dev community I mean being in a position where you're constantly seeing different people's ideas/thoughts/processes as a method of learning.

About a year ago, I started taking a hard look at my web development work flow.  It had become extremely repetitive and boring.  Some of the libraries I was using were so old that I wasn't able to update to 5.6... which for reference came out in 2014...

In ~2013 I started working with Codeigniter and I loved it.  It was so tiny compared to the other frameworks out there like CakePHP, or Laravel, and was easy enough to pick up and go that I didn't really ever take the time and look back.  This decision took it's toll over time though.

<img src="/assets/images/first-open-source-package/framework-compare.png" />

Codeigniter is **small** - This was beneficial for us because of 2 things.

1. It had a super small footprint. This was good for my team because our architecture was many small deployments.
2. It didn't have as many framework-specific abstractions / interfaces we'd need to learn to get moving quickly.

This got messy after a few years.  Codeigniter has great documentation for it's core features, but it doesn't (in my experience) have a large community of people who are working with it.  When I ran into a problem and couldn't figure it out, I'd frequently end up on Stack overflow looking at how people solved it in Laravel or CakePHP or some other system, and then figuring out how to move the solution to Codeigniter.

A little over a year ago, the team started a new project.  I like scrum - so we whipped up an MVP with Codeigniter and took a look at how it was going.  It wasn't scalable, and it showed strain really early.  This particular project desperately needed queue/workers to operate, and using PHP 5.6 (a limitation of some of our custom libs) for brand-new projects was getting stupidly-silly. We needed to do something else quickly, and we had a lot of baggage.

Someone approached me late in 2018 to help fix a few issues on an aging laravel project and I took a look at it, and literally couldn't find the project.  I ended up having to go through a few beginner tutorials to understand the project folder structure, but in that short time - I had to do some googling, and was blown away by how many responses there were for even the most basic of questions.  

There were free tutorials everywhere, people going open-source as a full-time career, and very active, obvious leaders in the huge community.  

This past year has been the single most learning-intensive experience of my entire life - and I'm hooked - I can't soak it in fast enough to the point where there are nights I can't shut my brain off because of how excited I am about what I'm working on the next day.  

I'm quite sure that very few if any people in community recognize my name, but I attribute the level of engagement I feel right now to that community - because when you can see how much stuff is actually going on, then it's really easy to pull up your socks and get in the game.