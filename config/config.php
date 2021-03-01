<?php

$dev_server = true;
define("LOCAL", true);
session_start();

if ($dev_server) {

    define("BA_DBHOST", "localhost");
    define("BA_DBUSER", "root");
    define("BA_DBPASSWORD", "");
    define("BA_DBNAME", "product");
    define('BASE_URL', 'http://localhost/product/');

    // DB connection
     $con = mysqli_connect(BA_DBHOST, BA_DBUSER, BA_DBPASSWORD, BA_DBNAME);

} 

define("DOCUMENT_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/");
define("SITE_DOCUMENT_ROOT", DOCUMENT_ROOT . SUBDIR);
define("HTTP_HOST", $_SERVER["HTTP_HOST"]);
define("REMOTE_ADDR", $_SERVER["REMOTE_ADDR"]);
define("SERVER_ADDR", $_SERVER["SERVER_ADDR"]);
define("SERVER_NAME", $_SERVER["SERVER_NAME"]);
define("REQUEST_URI", $_SERVER["REQUEST_URI"]);
define("SCRIPT_NAME", $_SERVER["SCRIPT_NAME"]);
define("PHP_SELF", $_SERVER["PHP_SELF"]);
define("PATH_ROOT", dirname(PHP_SELF) == '/' ? '' : dirname(PHP_SELF));
define("FILE_NAME", basename(PHP_SELF));
define("SITE_HTTP", BASE_URL);
define("SITE_HTTPS", BASE_URL);

// ADMIN
define("ADMIN_URL", BASE_URL . 'aPanel');
define("ADMIN_ASSETS", BASE_URL . 'assets');
define("ADMIN_CSS", BASE_URL . 'assets/css');
define("ADMIN_JS", BASE_URL . 'assets/js');
define("ADMIN_IMAGES", BASE_URL . 'assets/images');
define("ADMIN_ICON", BASE_URL . 'assets/icon');

// PRODUCT
define("PRODUCT_DIR", ADMIN_URL . '/product');