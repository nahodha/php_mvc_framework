<?php
  require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

  $dotenv = Dotenv\Dotenv::create(__DIR__);
  $dotenv->load();

  // DB Params
  define('DB_HOST', getenv('DB_HOST'));
  define('DB_USER', getenv('DB_USER'));
  define('DB_PASS', getenv('DB_PASS'));
  define('DB_NAME', getenv('DB_NAME'));

  // APP ROOT
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL ROOT
  define('URLROOT', getenv('URLROOT'));
  // SITE NAME
  define('SITENAME', getenv('SITENAME'));
