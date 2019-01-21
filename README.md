#Test Application for Mindvalley

#Installation
Use git checkout https://github.com/tanvir1674/mindvalley.git
#composer install
#comoser dump-autoload
#npm install

#php artisan migrate
#php artisan db:seed
#npm run dev
#php Artisan serve

Browse to http://127.0.0.1:8000 as artisan serve suggests
User web auth is activated, so login and registration from front is enabled.
Please register and use that account to login to access admin panel

#Screen shot added to give demo how the web interface should look like
MindValleyTestHome.png  TestAdminArticle.png  TestAdminTag.png




#Backend
REST Api driven development with Laravel 5.7
Use of VueJS for Admin frontend

#Code contains
Database migrations and seeds (Used Faker library to create dummy data)
CRUD and Resource Controllers
Form Validation and Requests
Use of VueJS / Jquery on frontend
Testing

#Functionalities
Listing of Article with Tag
Add/Delete operation on Tag and Article
Photo storing api end point added
but ui not added.

#Authentication:
For API Tymon JWT authentication is used for Token generation, 
to be used in Header:Authorization Bearer Token.

User web authentication is also enabled for using no api calls

#Database migrations 
Location: /medium/database/migrations

2014_10_12_000000_create_users_table.php            
2019_01_18_085309_create_tags_table.php      
2019_01_18_085351_create_photos_table.php
2014_10_12_100000_create_password_resets_table.php  
2019_01_18_085339_create_articles_table.php

#Database seeders: Factories used Fakers as suggested
Location: /medium/database/factories
ArticleFactory.php  PhotoFactory.php  TagFactory.php  UserFactory.php

Location: /medium/database/seeds
ArticleTableSeeder.php  DatabaseSeeder.php  PhotoTableSeeder.php  TagTableSeeder.php  UserTableSeeder.php

REST API Controllers and Resources
app/Http/Controllers
ArticleController.php  AuthController.php  PhotoController.php  TagController.php

app/Http/Resources
ArticleResource.php  PhotoResource.php  TagResource.php

#Exceptions added for API in app/Exceptions/Handler.php

#VueJs files are added in /resources/js and /resources/js/components


#Testing
Some Testing added for API AuthController and Article Controller
medium/tests/Unit

ArticleControllerTest.php  
AuthControllerTest.php

