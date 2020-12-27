<?php

$con = mysqli_connect("localhost","root","","online_book_shop");


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/OnlineBookShop/');
define('SITE_PATH','http://localhost/OnlineBookShop/');


define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/book/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/book/');


?>