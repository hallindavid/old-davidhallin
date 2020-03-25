---
extends: _layouts.post
section: content
title: BootstrapVueFormBuilder
date: 2020-03-25
description: It is a way to quickly scaffold Bootstrap Vue forms
categories: [opensource]
---


### What is BootstrapVueFormBuilder?



<div class="mx-auto text-center">
    <img src="/assets/images/post-2/quick-scaffold.gif" class="mx-auto my-4"/><br />
    <a href="https://bootstrapvueformbuilder.com" target="_blank" class="py-4 px-6 my-4 bg-gray-900 text-white hover:text-gray-400 text-2xl">Website</a>
    <a href="https://github.com/hallindavid/bootstrapvueformbuilder" target="_blank" class="py-4 my-4 px-6 bg-gray-900 text-white hover:text-gray-400 text-2xl"><i class="fab fa-github"></i> Git Repo</a>
</div>

Throughout my career, a huge portion of my regular work comes from creating forms for people.  People always need forms.

The regular progression in my situation is this.

1. I spend a bunch of time building a form
2. The customer likes the form, then tries it
3. The customer asks for changes to the form because they missed a field, or had an extra field they didn't need
4. Adding / removing those fields doesn't work in the nice grid layout that I built
5. Build new Grid layout for fields
6. Ensure responsive
7. Fix validation because you were being sloppy when rapidly doing the `cmd+x` + `cmd+v` all over the place and broke it

<iframe class="mx-auto" src="https://giphy.com/embed/GTTxe2PWPftOU" width="480" height="352" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p class="text-center"><a href="https://giphy.com/gifs/computer-pics-smash-GTTxe2PWPftOU">via GIPHY</a></p>

The idea behind this open-source project is to make it easy to scaffold out forms with the layout/responsiveness and then you can save them as .json files and can go back and modify them if you need to.

**Note** - this is using the <a href="https://bootstrap-vue.js.org/" target="_blank()"> BootstrapVue</a> Package - which basically allows us to do Vue.js validation prior to actually posting the form to the backend/api.

So you scaffold out a basic form using the interface - see the gif above.

Here's a super basic example:
<img src="/assets/images/post-2/simple-form.png" class="mx-auto w-full" />

There's not a lot to this one, but you can preview it in different window sizes, and make sure that when you shrink the page down, it looks like this instead
<img src="/assets/images/post-2/small-simple-form.png" class="mx-auto w-full" />

So you take the code export, add it to your project, give it to the customer, and wait for feedback.
You also save a JSON export of your form
```
[
    {
        "custom_class":"",
        "items":[
            {
                "id":1585137446098,
                "show_editor":true,
                "label":"First Name",
                "label_class":"",
                "scaffold_validation":false,
                "valid_feedback":"",
                "invalid_feedback":"Please enter a first name",
                "custom_model":false,
                "model":"first_name",
                "is_switch":false,
                "type":"input-text",
                "description":"",
                "placeholder":"",
                "min":"",
                "max":"",
                "num_rows":"",
                "max_rows":"",
                "size":"md",
                "step":"",
                "cols":"12",
                "cols_sm":"",
                "cols_md":"6",
                "cols_lg":""
                ,"cols_xl":"",
                "label_cols":"3",
                "label_cols_sm":"",
                "label_cols_md":"",
                "label_cols_lg":"",
                "label_cols_xl":"",
                "label_align":"center",
                "label_align_sm":"",
                "label_align_md":"",
                "label_align_lg":"",
                "label_align_xl":"",
                "select_options":[]
            },
            {
                "id":1585137487177,
                "show_editor":false,
                "label":"Last Name",
                "label_class":"",
                "scaffold_validation":false,
                "valid_feedback":"",
                "invalid_feedback":"Please enter a last name",
                "custom_model":false,
                "model":"last_name",
                "is_switch":false,
                "type":"input-text",
                "description":"",
                "placeholder":"",
                "min":"",
                "max":"",
                "num_rows":"",
                "max_rows":"",
                "size":"md",
                "step":"",
                "cols":"12",
                "cols_sm":"",
                "cols_md":"6",
                "cols_lg":"",
                "cols_xl":"",
                "label_cols":"3",
                "label_cols_sm":"",
                "label_cols_md":"",
                "label_cols_lg":"",
                "label_cols_xl":"",
                "label_align":"center",
                "label_align_sm":"",
                "label_align_md":"",
                "label_align_lg":"",
                "label_align_xl":"",
                "select_options":[]
            }
        ]
    }
]
```

It's just got the basic info about your fields, so when the customer comes back, you take that JSON file, re-import it into the BootstrapVueFormBuilder and you can do things like 

* click-and-drag the fields around to re-organize them
* resize with instant-preview
* make sure the adjusted form is still responsive etc.

And when you're doing a form with this tool, it will automatically add the basic vuejs data-bindings for your fields, which often times can be a pain

Anyways, Hope you guys like it!

If you want to try it out, feel free to copy/paste the JSON code above, and go to <a href="https://bootstrapvueformbuilder.com" target="_blank()">bootstrapvueformbuilder.com</a> and import it.
