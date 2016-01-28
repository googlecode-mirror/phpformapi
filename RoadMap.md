We're at version 0.1 now, to get to 1.0 we need a stable version that does the following:

## Features for 1.0 ##
### Form fields ###
  * Support almost all standard form fields.
  * Support standard form tekst ("titel", "description", ...)
### Validation ###
  * Automatically generate client side validation using jQuery.
  * Also do server side validation for common stuff (email, required field, ...).
  * Also allow user to define a validation function that is called upon submit.
### NOT for 1.0 (just say no) ###
  * Dealing with ajax forms. Only regular forms right now.
  * Theming. The default look should be clean, but we're not looking for great flexibility in theming right now. No built-in themeing, and also not loads of divs and such "for flexibility".
  * Custom formfields (like a datepicker, ...)
  * GET requests. POST will do for now.