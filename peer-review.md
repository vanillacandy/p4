## P3 Peer Review

+ Reviewer's name: Catherine Lin
+ Reviwee's name: Venkatesh Mantja
+ URL to Reviewe's P3 Github Repo URL: *https://github.com/venkateshmantha/dwa-p3*

## 1. Interface
Address as many of the following points as applicable:

+ Site interface seems very simple, clean and easy to understand. There are some color of the form makes design good. 
+ One minor confusing part might be that the usual drop down has a default selection for "Select your choice", this application's default is Meter to meter. 
+ The part that works well is efficiency of calculation of the app.
+ The one improvement I see is input field can only accept digits but not decimal points, for example 1.3 isn't a valid input. Users might need to convert decimal points very often in converter tool like this.


## 2. Functional testing


+ When entering a form without entering any data, it has a warning sign to remind users to enter field. 
+ When submitting a form with entering data in only some of the fields, the app still work. 
+ When input is asking for a digit, entering the following combinations: decimal numbers, negative numbers, letters, symbols, an extremely large number give the following result: The value must be a number. The value must be between 0 and 20 digits.. 
+ When accessing a URL on their site that does not exist, the output is 404 not found page.



## 3. Code: Routes

routes/web.php has two routes, that route to HomeController. The Homecontroller calculates and pass result back to the same page.


## 4. Code: Views

+ The template use inheritance.
+ There's no separation of concern issues, the non-display specific logic are in HomeController file instead of view files.
+ Nothing is done in PHP that could have been done in Blade.
+ Most of Blade syntax/techniques used in the app are familiar to me.

## 5. Code: General
Address as many of the following points as applicable:

+ The code is written consistent to the course notes. 
+ Best practices discussed in course material are addressed in the code.


## 6. Misc
n/a
