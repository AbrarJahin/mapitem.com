# mapitem.com

Build On - Laravel PHP Framework (v5.2.15)

==========================================

This site will be more likely of bikroy.com

But some more requirements are added.

But no documentations are given.

So, no readme file can be provided still now.


## Pages-
=========

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


###Installation

Install WAMP 2.5 (PHP>=5.5.9)

Install composer, take composer update, git clone go to the directory.

Then run

```bash

git clone https://abrarjahin@bitbucket.org/abrarjahin/mapitem.com.git

cd mapitem.com

composer install

--or

--composer install --ignore-platform-reqs

cp  .env.example .env

# Now change the .env file to set configurations and then run the bellow codes

composer dump-autoload

php artisan key:generate

# Now set up a DB according to .env file (for here 'mapitem')

php artisan migrate:refresh --seed

```

or for every time use-

```bash

php artisan migrate:refresh --seed

```

-------------------------------------------------------------------------------

In default configuration, if you are using local DB as user name - `root`, pass = "" and DB name = `mapitem`, then everything will be done for you autometically after making `composer install --ignore-platform-reqs`.

But you should have a Database named `mapitem` with user=`root` and no password is set in localhost.

-------------------------------------------------------------------------------

------------------------

Other libraries used-

Login Tool- https://github.com/laravel/socialite

FB Login- https://www.youtube.com/watch?v=EYdeTbQyhL8

Google Login- same as prev