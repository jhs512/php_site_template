<?php
define("DB_HOST", "127.0.0.1");
define("DB_ID", "root");
define("DB_PW", "");
define("DB_NAME", "phpSiteTemplate");

if ( !isset($config) ) {
    $config = [];
}

$config['dbConn'] = mysqli_connect(DB_HOST, DB_ID, DB_PW, DB_NAME) or die();

$config['siteName'] = '피부과';
?>