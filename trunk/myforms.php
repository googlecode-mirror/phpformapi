<?
// 1. Define a form (use YAML markup http://www.yaml.org)
// Use the correct variable name: "mytestform" is the form id.
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

// 2. Define a submit function
// Use the correct function name: "mytestform" is the form id.
function formapi_submit_mytestform($values) // the part after formapi_submit_ is the form id.
{
	print "<h2>My form was submitted!</h2><p>These are the values we got:</p>";
	print_r($values);
	
	//return "index.php"; // Redirect path. Return FALSE for no redirection.
	return FALSE;
}
?>