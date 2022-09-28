<?php
session_start();

define("PHPMailerEMAIL","ahmadsmadi873@gmail.com");
define("PHPMailerPASSWORD","flgynslrllefxxen");
define("MAXStorageForOneUser",15);//15mb  15000000
define('UPLOADFilesPATH','uploads/');


define("BU","");//base url for wep site.
define("ASSETS","http://localhost/malfat/assets/");//wep site assets. 
define('DOMINEName',$_SERVER['SERVER_NAME']);//get domine name





require_once("classes/usersModel.php");
require_once("classes/filesModel.php");



require_once("functions/validate.php");
require_once("functions/functions.php");
require_once("functions/sanitize.php");


