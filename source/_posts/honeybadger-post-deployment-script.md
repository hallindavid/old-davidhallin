---
extends: _layouts.post
section: content
title: a re-usable, sharable, committable Honeybadger post-deployment script
date: 2021-03-02
description: If you use honeybadger, and want to track deployments, this script is for you.
categories: [opensource]
---

Quick link to the GIST: <a href="https://gist.github.com/hallindavid/5225d76646f2f7b6fde9da30af140198">View Gist on Github</a>

## Some background info
I use <a href="https://www.honeybadger.io/">Honeybadger</a> for some of my applications, and today, I started pushing deployments to Honeybadger, but I wanted a file I was comfy committing to the repositiory.

I also didn't want each person who does a manual deployment to have to set it up on their device - it should just run.

So I wrote this little script and thought it may help others out

### Setup
 

1) Open terminal, browse to your project and get the file and save it by running this command
```shell
# grabs the gist, saves it in a file called post_deployment_script.sh
curl https://gist.githubusercontent.com/hallindavid/5225d76646f2f7b6fde9da30af140198/raw/309b994d7ea005e4587b0991920eb98f38a0feb9/post_deployment_script.sh > post_deployment_script.sh
```

2) Add execution rights on the file by running this command
```shell
chmod +x post_deployment_script.sh
```

3) Configure the file to meet your needs.  Open it up, the code is pretty readable, you can configure things like how you want to determine the users name, or the environment etc.
This is particularly valuable if you run multiple `production` environments and maybe want to track them seperately eg 'prod-canada' & 'prod-usa'
   
4) Finally, to actually run the deployment script use the following command
```shell
# If using the file or overridden options for setting environment
./post_deployment_script.sh

# If using the parameter option for setting environment
./post_deployment_script.sh development
```


Here is a link to the GIST again: <a href="https://gist.github.com/hallindavid/5225d76646f2f7b6fde9da30af140198">View Gist on Github</a>