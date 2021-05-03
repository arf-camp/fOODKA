<?php
define('SITE_NAME','FoodKA Admin');      //admin site title (not using for now)
define('FRONT_SITE_NAME','FoodKA App'); //cusomer site title


     //server path 
define('SERVER_IMAGE',$_SERVER['DOCUMENT_ROOT']."/food/");
// for upload image we will  use this 
define('SERVER_DISH_IMAGE',SERVER_IMAGE."media/dish/");




//site path
define('SITE_IMAGE',"http://127.0.0.1/food/");

//for calling image
define('SITE_DISH_IMAGE',SITE_IMAGE."media/dish/");
?>