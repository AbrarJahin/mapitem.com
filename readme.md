# mapitem.com

Build On - Laravel PHP Framework (v5.2.15)
-----------------------

# Requirements-

- PHP version between 5.5.9 - 7.1.*
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension

------------------------

This site will be more likely of bikroy.com

But some more requirements are added.

But no documentations are given.

So, no readme file can be provided still now.


## Pages
========

 1. Login Page

 2. Sign Up Page

 3. White List Page

 4. Site Map

 5. Privacy

 6. About Us

 7. Contact Us

 8. Help

 9. Terms And Conditions

 10. Blog Add + Edit

 11. +++++ Distance Managing (Finding Product By Distance) +++++

 12. Blog (CRUD)

 13. Message (CRUD)

 14. User Accounts (CRUD)

 15. Add Detail Page

 16. Dashboard

 17. Index (Home page)

 18. Listing with search (Both Logged In and Not Logged in)

 19. My Adds

 20. Offers

 21. Profile

 22. Settings


### Easy Installation On Windows

1. Install WAMP 2.5 (PHP>=5.5.9) or latest one

2. Install Git and composer. Take composer update.

3. This step is optional. Create a Database in localhost named `mapitem` with user root and no password.

4. Then run

```bash

git clone https://abrarjahin@bitbucket.org/abrarjahin/mapitem.com.git

cd mapitem.com
cp  .env.example .env
composer install
--or
--composer install --ignore-platform-reqs
## And You are done if u have followed optional step defined in step 3. If you did not follow, then continue.

# Now change the .env file to set Database and configurations and then run the bellow codes

composer dump-autoload

php artisan key:generate

php artisan migrate:refresh --seed

```

-------------------------------------------------------------------------------

In default configuration, if you are using local DB as user name - `root`, pass = "" and DB name = `mapitem`, then everything will be done for you autometically after making `composer install --ignore-platform-reqs`.

But you should have a Database named `mapitem` with user=`root` and no password is set in localhost.

-------------------------------------------------------------------------------

------------------------

Other Useful Links
------------------

1. [Login Tool Used In This Project - Socialite - Github](https://github.com/laravel/socialite)

2. Tutorial for Facebook Login with Socialite- [Tutorial 1](https://www.youtube.com/watch?v=EYdeTbQyhL8) / [Tutorial 2](https://www.youtube.com/watch?v=tx8XZ_t6SbQ)

3. Tutorial for Google Login with Socialite- [Tutorial 1](https://www.youtube.com/watch?v=0y0N75gkLb4) / [Tutorial 2](https://www.youtube.com/watch?v=qz0TOkkhcSQ)

4. [Paypal API Tutorial](https://www.youtube.com/watch?v=q5Xb5r4MUB8&feature=youtu.be)

5. [Coinbases API](http://www.sitepoint.com/bitcoin-php-coinbases-api-basic-usage/)

Compress CSS and JS -
---------------------

1. [CSS Minifire Online](https://cssminifier.com/)

2. [JS Minifire Online](http://javascriptcompressor.com/)

Config Ad Disable duration
--------------------------

1. Change value of `AD_AUTO_DISABLE_DAY_INTERVAL` in `.env` file.

2. Reset config file to take effect by running this command-

	php artisan config:clear
