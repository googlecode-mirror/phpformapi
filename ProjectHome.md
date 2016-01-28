Based on the ideas behind Drupal's form API, the php formapi is a standalone, easy to use form api that saves lots of coding.

  1. It's not finished, but you can download the working sourcecode.
  1. It's lightweight (just 1 file).
  1. It should save you lotsa work.
  1. It's easy to use (no need to be a hardcore coder).

## Design Goals ##
  * Be standalone and not too heavy, so the library can easily be incorporated into other projects. Things like themeing and such are probably too platform-specific to implement.
  * Be focused: do forms well, but don't do other stuff.
  * Be SUPER easy to use, for beginning programmers too.
  * Not more code than necessary.

## Features ##
  * No dependencies, a simple standalone library.
  * Forms can be created programatically
  * Validation is taken care of automatically.
  * Printing a form is done for you.
  * Receiving a submitted form is done for you.

## Status ##
  * First release as a proof of concept. It basically works, but needs lotsa cleanup.
  * RoadMap under construction


## Usage ##
To define a form, write it in simple yaml:
```
$formapi_define_mytestform = "
title: My test form
fieldset:
  label: it's a fieldset
textfield: 
  label: it's a textfield!
  required: TRUE
fieldsetclose:
checkbox: 
  label: my checkboxing
dropdown:
  label: my first dropdown
  values:
    First item: a
    Second item: b
    Third item: c
--- this is an inline comment that won't show up in the form.
radiogroup:
  id: radiogroup1
  title: Make a choice:
  values:
    The first one: a
    The second one: b
      selected: TRUE
    The final one: c
submitbutton:
  label: Send this form along!
";
```

Next, define a function that'll be called when the form is submitted:

```
function formapi_submit_mytestform($values) // the part after formapi_submit_ is the form id.
{
  print "<h2>My form was submitted!</h2><p>These are the values we got:</p>";
  print_r($values);
  return FALSE; // return a path if you want to redirect the user.
}
```

You're done!

Now, to show the form, just call:

```
formapi_print("mytestform");
```

To create a page that receives all forms, create a php page and add this:

```
include_once("formapi.php"); // include form api
include_once("myforms.php"); // include all form definitions
formapi_receiveform();
```

All forms will be submitted to this page. It will know what to do because each form has an id.

That's it. No more coding needed.