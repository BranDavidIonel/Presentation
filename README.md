#Steps to install

1.composer install

2.copy env.example file and make a new .env file


3.make a new DB 'presentation' ,  set in .env

     DB_DATABASE=presentation
    
     DB_USERNAME=root 
    
     DB_PASSWORD=


4.php artisan migrate

5.php artisan key:generate

6.php artisan storage:link

7.php artisan db:seed

 
