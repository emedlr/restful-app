Micro RESTful webservice
========================

Sloppy try to make a RESTful app with Silex. Made in one hour.

Installation
------------

1. Download [composer][1]: `curl -sS https://getcomposer.org/installer | php`

2. Run: `php composer.phar install`

Routes
------

This service open the doors through two ways:


* Recieves a JSON object post call and saves it into database.

	Route: `/api/comments`
	Method: `POST`

* Fetch all comments from database and returns it as JSON object.

	Route: `/api/comments`
	Method: `GET`

* There is a third route that allows you to test the service, with a simple jQuery `$.ajax` function.

	Route: `/test`
	Method: `GET`


Comments, ideas
---------------

Are welcome. Mail me (mgmerino@gmail.com) or open an issue.

[1]: http://getcomposer.org/
