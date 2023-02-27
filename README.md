## Using jetstream .

Website : https://jetstream.laravel.com/3.x/introduction.html

## Task 1 : CRUD For Product .

### Controller 

    1.ProductController
### Model
    1.Product
    2.ProductImage
    3.Category
    4.Brand
### View 
    1.master/admin/master
    2.admin/include
    3.admin/product

## Task 2: RestApi .
    using sanctum package 
    composer require laravel/sanctum

### Vendor Publish ...
    php artisan vendor:publish --provider 
    Select sanctum service provider ....

### Controller .. 

    1.BaseController

    2.Api/ApiAuthController
    Here working with login & logout ...</t>


    3.Api/CategoryController

    In store function we store the  about category (method will be "POST" here) </br>
    In index function we try to retrieved all category(method will be "GET")</br>
    In show function we showing category by id</br>
    In update function we are updating the category(Method will be "Put" here)</br>
    In delete function we are deleting a product (Method will be delete here)</br>
### Check Api
    Using Postman
### Model
    1.Category

## Task 3: Task manager

### Controller
    1.TaskController

### Model
    1.Task
    2.Project

### Views
    1.master/admin/master
    2.admin/include
    3.admin/task

## Task 4 :User Authentication System

### Controller
    1.App\Http\Controllers\Front\FrontUserAuthController;
### Model 
    1.FrontUser

### Views
    1.master/front/master
    2.front/include
    2.front/frontUser
    

## Task 5 :Blog Application

### Controller
    1.Blog\HomeController;
    2.Blog\PostController;
    3.Blog\CommentController;
### Model
    1.Post
    3.Comment
### Views
    1.master/front/master
    1.front/include
    2.front/home
    2.front/post


## Middleware Used for Task 3 & Task 4

### Middleware 
    1.FrontUserLoginMiddleware
    2.FrontUserLogoutMiddleware
In kernel</br>

    'front_user_login' => FrontUserLoginMiddleware::class,
    'front_user_logout' => FrontUserLogoutMiddleware::class,
