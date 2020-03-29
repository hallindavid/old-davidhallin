---
extends: _layouts.post
section: content
title: Deploying a static site to a repo subtree and hosting it for free on github pages
date: 2020-03-29
description: I explain how I setup an easy way of deploying to github pages with a domain name
categories: [general]
---


Well - for anyone interested in free hosting for a static website using a service like github pages - that's what this post is about. 

I mentioned in my <a href="/blog/first-post">First Post</a> that I whipped up this site in about an hour with a Static Site Generator called Jigsaw, and deployed it to github pages.

<a href="https://jigsaw.tighten.co/">Jigsaw</a> comes with fantastic <a href="https://jigsaw.tighten.co/docs/installation/">documentation</a> so is generally pretty easy generate the static files, but there is a bit of a catch when using free git repo static hosting if you want to keep it all in one repository.

In the documentation, they say do this
```
npm run production
git add build_production && git commit -m "build for deploy"
git subtree push --prefix build_production origin gh-pages
```

This will work the first time.  Then when you go and point your domain to github pages though, github adds a file called `CNAME` it's contents are super basic, it's just the domain name - you can check it out in my `gh-pages` <a href="https://github.com/hallindavid/davidhallin/tree/gh-pages">branch for this website</a>.

So then you move along, it's published, but you change something.  When you go to deploy again, your `build_production` folder get's rebuilt.

Then you run through the same thing again, you add the modified files and then go to run this command again
```
git subtree push --prefix build_production origin gh-pages
``` 
and it says that your local version of gh-pages is behind the origins - which it is, Github added a file there, so you are behind.

So there is actually a little list of things which need to happen when you're ready to deploy

1. You need build for production again
```sh
npm run production
```
2. You will need to recreate the `CNAME` record, because that will have been deleted during the build.  You can do that through something like this. 
```sh
echo 'davidhallin.com' > build_production/CNAME
```
<small class="italic">Obviously replace davidhallin.com with your CNAME value.</small>

3. You will want to go through the git process again, but force-override the existing gh-pages version on github.
```sh 
# add build_production to commit
git add build_production
# commit build production
git commit -m "build for production" 
# new local branch for build_production
git subtree split --prefix build_production -b gh-pages
# this will overwrite the github gh-pages with your new local gh-pages
git push -f origin gh-pages:gh-pages
# this will delete the local branch you just wrote
git branch -D gh-pages
```

So this is the workflow that allows for easy, no-bologna configuration deployment, and this will work with anything - this is less about static site generation than it is about serving a sub-folder on static hosting.  You could use this same logic to serve content on netlify, or render or aws s3. 

So - I made this into an npm script 

```
"scripts": {
    "production": "cross-env NODE_ENV=production node_modules/webpack/bin/webpack.js --progress --hide-modules --env=production --config=node_modules/laravel-mix/setup/webpack.config.js",
    "dev": "npm run local",
    "watch": "npm run local -- --watch",
    "deploy": "npm run production && echo 'davidhallin.com' > build_production/CNAME && git add build_production && git commit -m \"build for production\" && git subtree split --prefix build_production -b gh-pages && git push -f origin gh-pages:gh-pages && git branch -D gh-pages"
},
```
and then I execute by running `npm run deploy`
but you could just as easily make a new file like `build.sh`
```sh
npm run production
echo 'davidhallin.com' > build_production/CNAME
git add build_production
git commit -m "Build for Production"
git subtree split --prefix build_production -b gh-pages
git push -f origin gh-pages:gh-pages
git branch -D gh-pages
```


and then run `./build.sh` to deploy when ever you want to deploy.

Hope somebody finds this useful!
