# Easy development ready #

1. Create a DB named `mapitem` and using user= `root` and pass = ``
2. Then run this commands

	git clone https://abrarjahin@bitbucket.org/abrarjahin/mapitem.com.git
	composer install

And everything is ready for you !!

___________________________________________________________________________

# Server Easy deploy #

Login-
------

	ssh blockhunt@107.180.1.4
	Maplevel1

Create project-
---------------

	cd public_html
	rm -rf abrar
	git clone https://abrarjahin@bitbucket.org/abrarjahin/mapitem.com.git abrar
	cd abrar
	php /home/blockhunt/drush/composer.phar install
	php /home/blockhunt/drush/composer.phar dump-autoload
	php artisan key:generate
	php artisan clear-compiled
	composer dump-autoload
	php artisan optimize

	cp ../.env .env
	#cp .env.example .env
	#nano .env

	php artisan migrate:refresh --seed

In 2 line (After deleting the DB)-
----------------------------------

	cd && cd public_html && rm -rf abrar && git clone https://abrarjahin@bitbucket.org/abrarjahin/mapitem.com.git abrar && cd abrar && php /home/blockhunt/drush/composer.phar install && php /home/blockhunt/drush/composer.phar dump-autoload && php artisan key:generate && php artisan clear-compiled && php artisan optimize

	cp ../.env .env && php artisan migrate:refresh --seed

Update Project (if no major change)-
------------------------------------

	ssh blockhunt@107.180.1.4
	Maplevel1
	cd public_html/abrar && git pull -f

	exit

___________________________________________________________________________________________

FTP Details-
============================

	host - ftp.blockhunt.com
	port - default
	user - abrar@blockhunt.com
	pass - piash@205

Previous-
=====================================================

	ftp.blockhunt.com
	User: blockhunt
	Pass: Maplevel1
	The links are all on www.mapitem.com/frontend/

c-panel detail-
===============

	https://a2plcpnl0047.prod.iad2.secureserver.net:2083/
	user-blockhunt
	pass-Maplevel1

Installed composer in shared hosting using drush -
==================================================

	https://www.godaddy.com/help/how-to-install-drush-on-cpanel-shared-hosting-12396

Changing Default Root Folder-
=============================

1. Way 1-

https://www.servint.net/university/article/the-tech-bench-changing-a-document-root-in-cpanel/

For our site, command -

	nano /var/cpanel/userdata/blockhunt/mapitem.com

2. Way 2-

https://manage.accuwebhosting.com/knowledgebase/1269/How-do-I-change-document-root-folder-to-some-sub-folder-using-an-htaccess-file.html

======================================================

DB of Staging-
===================

	DB   - abrar
	user - abrar
	pass - abrar
	host - localhost

------------------------------------------------------

Git Merge -
===========

	git checkout master
	git pull origin master
	git merge test
	git push origin master

Git Delete Branch-
------------------

	git push origin -d <branchName>

Git Create Branch-
------------------

	git checkout -b <branchName>

Git Switch to a branch Branch-
------------------------------

	git checkout <branchName>




-------------------------------------------------------------------------

Coinbases API
=============
http://www.sitepoint.com/bitcoin-php-coinbases-api-basic-usage/

Google Login-
=============
https://www.youtube.com/watch?v=qz0TOkkhcSQ

Facebook Login-
===============
https://www.youtube.com/watch?v=tx8XZ_t6SbQ

Paypal API
==========
https://www.youtube.com/watch?v=q5Xb5r4MUB8&feature=youtu.be

Deploy (Remove Public Folder)-
==============================
http://stackoverflow.com/questions/28364496/laravel-5-remove-public-from-url/28735930#28735930
