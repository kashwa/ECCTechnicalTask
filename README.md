# Installation 
Clone repo

	https://github.com/kashwa/ECCTechnicalTask.git
Install the composer dependencies

	composer install
	
Save .env.example as .env and put your database credentials

Set application key

	php artisan key:generate        

Seed & Migrate with


	php artisan migrate
    

	php artisan db:seed
