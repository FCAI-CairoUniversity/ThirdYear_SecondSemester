Prerequisites
php > 8.3
composer installed
check via: composer --version

// To run the project 
1. composer update --no-scripts
2. composer install
3. php artisan serve

// TO create a resource controller
php artisan make:controller UserController --resource

//To temporary disable CSRF protection on certain routes
 // add the following code to withMiddleware in bootstrap/app.php
        $middleware->preventRequestForgery(except: [
            '/user/*'
        ]);

//Controller resource methods (you can use "POSTMAN" or extensions like "THUNDER CLIENT" for testing)
Controller      Method	Concrete URL example	    	    What it does
index()	        GET     http://localhost:8000/user	        List all users
create()	    GET     http://localhost:8000/user/create	Show “create user” form
store()	        POST    http://localhost:8000/user	    	Save new user
show($id)	    GET     http://localhost:8000/user/1	    	Show user with ID = 1
edit($id)	    GET     http://localhost:8000/user/1/edit	Show edit form for user ID = 1
update($id)	    PUT     http://localhost:8000/user/1	    	Update user ID = 1
destroy($id)	DELETE  http://localhost:8000/user/1	    	Delete user ID = 1
