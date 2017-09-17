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

Other libraries used-

Login Tool- https://github.com/laravel/socialite

FB Login- https://www.youtube.com/watch?v=EYdeTbQyhL8

Google Login- https://www.youtube.com/watch?v=0y0N75gkLb4