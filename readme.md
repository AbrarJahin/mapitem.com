# blockhunt.com

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

Install composer, take composer update, git clone go to the directory.

Then run

```bash

composer install

```

and if composer packages already installed and if you add any new package you need to do composer update

then after -> set up .env file from .env.eexample and change he .env file to configurations, run these below commands

```bash

composer dump-autoload

php artisan key:generate

php artisan migrate:reset

php artisan migrate --seed

```

or for every time use-

```bash

php artisan migrate:refresh --seed

```
