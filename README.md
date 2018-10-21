Documentaion
------------
3 APIs for mobile app using jwt Authentication




run
----

1- first run command "php artisan migrate" to create users and country tables 


2- then run command "php artisan serve" 


3- open postman and make request using method post http://localhost:8000/api/register :

   it will return token and success message

4- make request using post method "http://localhost:8000/api/login" :

   it will return token success message
    
5- make request using get method  "http://localhost:8000/api/countries" , you should copy the token that created when logged in and put in header    before make request :

   it will return a list of countires  
    
    

Software
--------

1- php laravel 

2- mysql 

3- Postman For testing api 








