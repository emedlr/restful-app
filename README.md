Micro RESTful webservice
========================

Sloppy try to make a RESTful app with Silex. Made in one hour.

Routes
------

This service open the doors through two ways:

Route: `/api/comments`
Method: `POST`

Recieves a JSON object post call and saves it into database.

Route: `/api/comments`
Method: `GET`

Fetch all comments from database and returns it as JSON object.

Route: `/test`
Method: `GET`

There is a third route that allows you to test the service, with a simple jQuery `$.ajax` function.

Comments, ideas
---------------

Are welcome: mgmerino [at] gmail