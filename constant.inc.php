<?php
define('SITE_NAME','FoodKA Admin');      //admin site title (not using for now)
define('FRONT_SITE_NAME','FoodKA App'); //cusomer site title






     //server path 
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT']."/food/");

//site path
define('FRONT_SITE_PATH',"http://127.0.0.1/food/");

//contact us path

define('CONTACT_SITE_PATH',"http://127.0.0.1/food/contact-us");


// for insert image we will  use this 
define('SERVER_DISH_IMAGE',SERVER_PATH."media/dish/");
//for calling image
define('SITE_DISH_IMAGE',FRONT_SITE_PATH."media/dish/");



//for banner inserting
define('SERVER_BANNER_IMAGE',SERVER_PATH."media/banner/");
//for showing
define('SITE_BANNER_IMAGE',FRONT_SITE_PATH."media/banner/");

?>