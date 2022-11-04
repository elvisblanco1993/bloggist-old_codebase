# Bloggist
Welcome to the main repository for **Bloggist**, the minimalistic blogging platform for everyone.

Please read along to setup your own **Bloggist** instance.

## Before you start
There are some things you will need before you can get started developing with **Bloggist**.

- Apache/Nginx (You can also use [MAMP][mamp] or [XAMPP][xampp], which are available for both Mac OS and Windows)
- MySQL server (database server)
- [VS Code][vscode] (code editor)
- [Beekeeper Studio][beekeeper] (database management software)
- [Git][git] (version control management)
- [Composer][composer] (PHP package manager)
- [NPM][npm] (JS package manager)

[beekeeper]: https://www.beekeeperstudio.io/get
[vscode]: https://code.visualstudio.com/Download
[git]: https://git-scm.com/downloads
[composer]: https://getcomposer.org/download/
[npm]: https://nodejs.org/en/
[mamp]: https://www.mamp.info
[xampp]: https://www.apachefriends.org/

## Getting **Bloggist** up and running in your machine

1. Clone the repository into your development environment

    ```git clone https://github.com/elvisblanco1993/bloggist.git```

2. Move into the project directory

    ```cd bloggist```

3. Create the environment file.

    ```cp .env.example .env``` for UNIX based systems, and ```copy .env.example .env``` on MS Windows

4. Install back-end dependencies

    ```composer install```
    
   For Rateable run the following to publish the package

   ```php artisan vendor:publish --provider="willvincent\Rateable\RateableServiceProvider" --tag="migrations"```
   
```php artisan migrate```

5. Install front-end dependencies

    ```npm install```

6. Generate application key (this will help with encryption and security)

    ```php artisan key:generate```

7. Create database

    1. Open a terminal window, and access your MySQL

    ```sudo mysql -u root -p;```

    2. Create your database and assign permissions

    ```CREATE DATABASE bloggist;```

    ```CREATE USER 'bloggist'@'localhost' IDENTIFIED BY 'SET_YOUR_PASSWORD_HERE';```

    ```ALTER USER 'bloggist'@'localhost' IDENTIFIED WITH mysql_native_password BY 'SET_YOUR_PASSWORD_HERE';```

    ```GRANT ALL PRIVILEGES ON bloggist.* to 'bloggist'@'localhost' WITH GRANT OPTION;```

    ```FLUSH PRIVILEGES;```

    ```exit;```

 8. Add your database credentials to Bloggist.

    Open your *.env* file, and modify the following lines

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=bloggist
    DB_USERNAME=bloggist
    DB_PASSWORD=SET_YOUR_PASSWORD_HERE
    ```
9. Run migrations (this will create your database tables)

    ```php artisan migrate```
    
10. Generate front-end assets

    ```npm run build``` or ```npm run dev``` if you want live reload
