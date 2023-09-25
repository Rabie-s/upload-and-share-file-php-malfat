<?php
session_start();

define("PHPMailerEMAIL","");//your gmail
define("PHPMailerPASSWORD","");//your password
define("MAXStorageForOneUser",15);//15mb  15000000
define('UPLOADFilesPATH','uploads/');


define("BU","http://localhost/upload-and-share-file-php-malfat/");//base url for wep site.
define("ASSETS","http://localhost/upload-and-share-file-php-malfat/assets/");//wep site assets. 
define('DOMINEName',$_SERVER['SERVER_NAME']);//get domine name


require_once("classes/usersModel.php");
require_once("classes/filesModel.php");

require_once("functions/validate.php");
require_once("functions/functions.php");
require_once("functions/sanitize.php");


