# Shopping-system
1.Clone the master branch
from https://github.com/MayarAlaa1/Shopping-system.git or download
the compressed folder

2.Inside the project folder run
To install all the project composer dependencies, after running composer install it
checks the composer. json file which is submitted to the GitHub repo and lists all of
the composer (PHP) packages that your repo requires.

composer install

3. To install NPM dependencies

The list of packages that a repo requires is listed in the package.json file which is
submitted to the GitHub repo

npm install

4. Create a copy of your. env file
as .env is in the git ignore file it is not generally committed, so we will need to copy
the .env.example as it is a template of .env to apply our database configurations
inside it

cp .env.example .env

5. Generate an app encryption key
Laravel requires you to have an app encryption key which is generally randomly
generated and stored in your .env file. The app will use this encryption key to encode
various elements of your application from cookies to password hashes and more.

php artisan key:generate

6. Create an empty database for our application
create database inova;

7. In the. env file, add database information to allow Laravel to connect to the database
In the. env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and
DB_PASSWORD options to match the credentials of the database you just created.

8. Migrate the database
php artisan migrate

9. Finally you can run the application
php artisan serve

