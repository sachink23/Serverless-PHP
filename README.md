# Serverless-PHP

Serverless-PHP is a simple, lightweight, and object oriented framework based on Bref, which simplifies the application development process using handlers (similar to the Components in Angular Framework) on AWS using Lambda Functions and API Gateway.
Serverless-PHP manages requests from API Gateway, their routing, and formats response to return from the function to the user through API Gateway.

* Framework based on https://bref.sh/ for building serverless PHP applications on AWS Lambda.

## Using CLI
* We have a simple CLI utillity which can help us to create simple code files like handlers and classes.
* To use the cli we run the following command from the project directory - 
    `php sls`
*  Commands -
1) Create -
    * Create command is used to create handlers and classes.
    1) Creating Handler -
    
        ```php sls create handler "path/to/HandlerName"```
        
        To create a new handler we use the above command it will create a new handler in `./src/app/path/to/HandlerNameHandler.php`
        
    2) Creating Class -
    
        ```php sls create class "path/to/ClassName"```
        
        To create a new class we use the above command it will create a new class in `./src/app/path/to/ClassName.php`
        

