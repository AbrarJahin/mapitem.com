# Config of `.env` file

Database-
---------

```
DB_HOST=localhost
DB_DATABASE=mapitem
DB_USERNAME=root
DB_PASSWORD=
```

Email Config-
-------------

```
MAIL_DRIVER=smtp
MAIL_HOST=a2plcpnl0047.prod.iad2.secureserver.net
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
MAIL_USERNAME=support@mapitem.com
MAIL_PASSWORD=Maplevel1
MAIL_ADDRESS=support@mapitem.com
MAIL_SENDER_NAME=Mapitem-Support
```

Facebook Login Config-
----------------------

```
FB_APP_ID=192665961258099
FB_SECREAT=fb63b2150a31bdd3db26039d08bdba78
FB_CALLBACK_URL=http://mapitem.com/auth/facebook/callback
```

Google Login Config-
--------------------

```
GOOGLE_APP_ID=192949909401-l4167qdm9ndep34tbtegppsb41t2lrbg.apps.googleusercontent.com
GOOGLE_SECREAT=ar5vbrsGH_izX8Mf3m0TULPd
GOOGLE_CALLBACK_URL=http://mapitem.com/auth/google/callback
```


API Key for Google Map-
-----------------------

	GOOGLE_MAP_API_KEY=AIzaSyDKITAcwcdQEVD8j0kz6S3cmDhAwqyX2AE

Max no of ads shown in sitemap-
-------------------------------

	MAX_ADS_PER_PAGE_SITEMAP=1000

No of days needed for a ad being disabled automatically-
--------------------------------------------------------

	AD_AUTO_DISABLE_DAY=10

To update any value in `.env` file, you need to do this following steps-

1. Login to server with SSH/Putty/Git

2. Then go to the `.env` file directory-

	cd public_html/abrar/

3. Then open `.env` file with nano-

	nano .env

4. Change any value you need.

5. Then save and exit using command-

	`Ctrl` + `X` -> `Y` -> `Enter`

6. Then you are done :).

## Command for reloading all data in `.env` file

	php artisan config:cache
	php artisan config:clear
	php artisan cache:clear
	php artisan view:clear 

Run this commands after update any data in `.env` file.
