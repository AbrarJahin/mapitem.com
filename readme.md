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

git clone https://abrarjahin@bitbucket.org/abrarjahin/blockhunt.com.git

cd blockhunt.com

composer install

cp  .env.example .env

# Now change the .env file to set configurations and then run the bellow codes

composer dump-autoload

php artisan key:generate

# Now set up a DB according to .env file (for here 'blockhunt')

php artisan migrate:refresh --seed

```

or for every time use-

```bash

php artisan migrate:refresh --seed

```
