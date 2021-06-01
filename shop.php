<?php 


include('header.php');

$cat_dish='';
$cat_dish_arr=array();
if(isset($_GET['cat_dish'])){
    $cat_dish=$_GET['cat_dish'];

// what we found through url we explode it by php explode and remove empty array by array filter

$cat_dish_arr=array_filter(explode(':',$cat_dish));


// making variable to save data with comma(1,2,3,4)

$cat_dish_str=implode(",",$cat_dish_arr);




}


 ?>



        <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="shop.php">Shop</a></li>
                        <!-- <li class="active">Shop Grid Style </li> -->
                    </ul>
                </div>
            </div>
        </div>
      

        <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    


                    <div class="col-lg-9">
                       
                        <!-- <div class="banner-area pb-30">
                            <a href="product-details.html"><img alt="" src="assets/img/banner/banner-49.jpg"></a>
                        </div> -->
  <?php 

   $cat_id=0;
$product_sql="select * from dish where status=1";

                     
// if we get category id through url then if condition will excecute(for exact category id fetch)
               
                      // if(isset($_GET['cat_id']) && $_GET['cat_id']>0)

                      //       {
                      //           $cat_id=get_safe_value($_GET['cat_id']);
                      //           $product_sql.=" and category_id='$cat_id' "; //note:we have space after
                      //       }



 if(isset($_GET['cat_dish']) && $_GET['cat_dish']!='')
 { 

  $product_sql.=" and category_id in ($cat_dish_str) ";
          
 }

   $product_sql.=" order by dish desc";
 $product_res=mysqli_query($con,$product_sql);
  // counting query 
   $product_count=mysqli_num_rows($product_res);


 ?>    




                        
   <div class="grid-list-product-wrapper">
 <div class="product-grid product-view pb-20">
                              
   <!--     if we dont have dish it will execute else block -->

         <?php if($product_count>0){?>

    <div class="row">

     <?php while($product_row=mysqli_fetch_assoc($product_res)){?>

       <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
           <div class="product-wrapper">
       <div class="product-img">
     <a href="javascript:void(0)">
       <img src="<?php echo SITE_DISH_IMAGE.$product_row['image']?>" alt="">
        </a>
                                            
      </div>
                                            
      <div class="product-content" id="dish_detail">
               
               <h4>
         <a href="javascript:void(0)"><?php echo $product_row['dish']?></a>
                </h4>


<!-- //dish attributes -->

<?php
                                                   

$dish_attr_res=mysqli_query($con,"select * from dish_details where status='1' and dish_id='".$product_row['id']."' order by price asc");
                                                    
 ?>

<div class="product-price-wrapper">
 
  <?php
     while($dish_attr_row=mysqli_fetch_assoc($dish_attr_res))
     {
        echo "<input type='radio' class='dish_radio' name='radio_".$product_row['id']."' value='".$dish_attr_row['id']."'/>";
        echo $dish_attr_row['attribute'];
        echo "&nbsp;";
        echo "<span class='price'>(".$dish_attr_row['price'].")</span>";
        echo "&nbsp;&nbsp;&nbsp;";
                                                        
      }
             
  ?>



 </div>



  </div>

</div>
    </div>
				<?php } ?>
									
</div>

<?php  } 


else { echo "Dish is not available for now";} ?>

                            </div>
                            
                        </div>
                    </div>
           
   
    <?php
            //fetching all the category we have made
      $cat_res=mysqli_query($con,"select * from category where status=1 order by order_number desc")
                    ?>


 <div class="col-lg-3">
  <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
    <div class="shop-widget">
       <h4 class="shop-sidebar-title">Shop By Categories</h4>
         <div class="shop-catigory">
<ul id="faq"  class="category_list">
      <li><a href="shop.php"><u>clear</u></a></li>
  <?php 
      while($cat_row=mysqli_fetch_assoc($cat_res)){
        $class="selected";
          //if  customer selected any category will go  if block selected a class
    
    if($cat_id==$cat_row['id']){
             $class="active";
       }
                          




 ///for oneline tap
 // echo "<li> <a class='$class' href='shop.php?cat_id=".$cat_row['id']."'>".$cat_row['category']."</a></li>";  
 
 $is_checked='';

 if(in_array($cat_row['id'],$cat_dish_arr)){
         $is_checked="checked='checked'";
     }



//checkbox

 echo "<li> <input $is_checked onclick=set_checkbox('".$cat_row['id']."') type='checkbox' class='cat_checkbox' name='cat_arr[]' value='".$cat_row['id']."'/>".$cat_row['category']."</li>";

                                        }
                                        ?>









                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


<!-- for checkbox category functionality -->

<form method="get" id="frmCatDish">
            <input type="textbox" name="cat_dish" id="cat_dish" value='<?php echo $cat_dish?>'/>
        </form>

            <script>
            function set_checkbox(id){
                var cat_dish=jQuery('#cat_dish').val();
              
                var check=cat_dish.search(":"+id);    //searching value
                if(check!='-1'){
                    //for uncheck if we found value then remove it on url(replace with blank)
                    cat_dish=cat_dish.replace(":"+id,'');  
                }else{
                    cat_dish=cat_dish+":"+id;   //otherwise adding  
                }



                jQuery('#cat_dish').val(cat_dish);
                jQuery('#frmCatDish')[0].submit();
            }
        </script>



       

<?php  include('footer.php'); ?>