<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'scraftyshop';

$db = mysqli_connect($host, $user, $pass, $db);
if(mysqli_connect_errno()) {
  echo 'Database connection failed with following errors: '. mysqli_connect_error();
  die();
}
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/scrafty_shop/config.php';
require_once BASEURL.'helpers/helpers.php';
require_once BASEURL.'/vendor/autoload.php';

$cart_id = '';
if(isset($_COOKIE[CART_COOKIE])){
  $cart_id = sanitize($_COOKIE[CART_COOKIE]);
}
