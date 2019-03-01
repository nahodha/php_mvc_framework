# MINIMAL DIY PHP MVC BASED FRAMEWORK

This is a simple php framework template, which includes models, views and controllers.
It is intended for building simple projects, that don't require all of features in larger, more robust frameworks like laravel.

## Requirements
* php5.1 or greater
* mysql
* phpmyadmin
* composer
* phpdotenv

## Setup
First install php composer globally

```
## Make a composer dir where we'll install composer

$ cd ~
$ mkdir composer
$ cd composer
$ mkdir bin
```

```
## Download composer

$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ php composer-setup.php
$ php -r "unlink('composer-setup.php');"
```

```
## install globally
$ mv composer.phar /usr/local/bin/composer
```

## Install phpdotenv

```
cd /home/yourpc/myproject
$ composer require --dev vlucas/phpdotenv
```

Make a `.env` file preferably in the `config` directory with all your details e.g.

```
DB_HOST=localhost
DB_PASS=verystrongpassword
DB_USER=dbuser
DB_NAME=YOUR_DB_NAME
URLROOT=http://YOURSITE/MVC
SITENAME=YOUR_SITE
```

## Go to public directory and change the `.htaccess`
```
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /{YOURMVCDIRECTORY}/public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

## make sure to enable mod_rewrite
```
$ sudo a2enmod rewrite
$ sudo service apache2 restart
```
