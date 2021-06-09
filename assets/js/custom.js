
jQuery('#frmRegister').on('submit',function(e){
	
	jQuery('.error_field').html('');   //initialize blank
	jQuery('#register_submit').attr('disabled',true);  //when it is processing,  button will be disabled
	jQuery('#form_msg').html('Please wait...');   //after pressing some mssg will show up till processing
	

	jQuery.ajax({
		url:FRONT_SITE_PATH+'login_register_submit',
		type:'post',
		data:jQuery('#frmRegister').serialize(),
		
  success:function(result){
			

jQuery('#form_msg').html('');   //initialize blank 
jQuery('#register_submit').attr('disabled',false); //when processing finished button enable


var data=jQuery.parseJSON(result);  //data we get from url page we devide

if(data.status=='error')
{    //if in array we get status  error value then 
jQuery('#'+data.field).html(data.msg);
	}

if(data.status=='success')
{
	jQuery('#'+data.field).html(data.msg);

	// after submitting reset all the value
	jQuery('#frmRegister')[0].reset();   
				
}
		

}
		
	});
	e.preventDefault();
});	





jQuery('#frmLogin').on('submit',function(e){
	jQuery('.error_field').html('');
	jQuery('#login_submit').attr('disabled',true);
	jQuery('#form_login_msg').html('Please wait...');
	jQuery.ajax({
		url:FRONT_SITE_PATH+'login_register_submit',
		type:'post',
		data:jQuery('#frmLogin').serialize(),
		success:function(result){
			jQuery('#form_login_msg').html('');
			jQuery('#login_submit').attr('disabled',false);
			var data=jQuery.parseJSON(result);
			if(data.status=='error'){
				jQuery('#form_login_msg').html(data.msg);
			}
			var is_checkout=jQuery('#is_checkout').val();
			if(is_checkout=='yes'){
				window.location.href='checkout';
			}else if(data.status=='success'){
				//jQuery('#form_login_msg').html(data.msg);
				window.location.href='shop';
			}
		}
		
	});
	e.preventDefault();
});	




jQuery('#frmForgotPassword').on('submit',function(e){
	jQuery('#forgot_submit').attr('disabled',true);
	jQuery('#form_forgot_msg').html('Please wait...');
	jQuery.ajax({
		url:FRONT_SITE_PATH+'login_register_submit',
		type:'post',
		data:jQuery('#frmForgotPassword').serialize(),
		success:function(result){
			jQuery('#form_forgot_msg').html('');
			jQuery('#forgot_submit').attr('disabled',false);
			var data=jQuery.parseJSON(result);
			if(data.status=='error'){
				jQuery('#form_forgot_msg').html(data.msg);
			}
			if(data.status=='success'){
				jQuery('#form_forgot_msg').html(data.msg);
				
			}
		}
		
	});
	e.preventDefault();
});	




// category checkbox
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



// for veg non veg filteration


function setFoodType(type){
        jQuery('#type').val(type);
        jQuery('#frmCatDish')[0].submit();
      }



// add to cart

function add_to_cart(id,type){
       // alert(id);

var qty=jQuery('#qty'+id).val();  //gaining quantity value
// var attr=jQuery('#radio_'+id).val();  //gaining same radio button use in inspect (gaining dish id)


var attr=jQuery('input[name="radio_'+id+'"]:checked').val(); //gaining dish_details (means atrribute value) id

var is_attr_checked='';
	if(typeof attr=== 'undefined'){
		is_attr_checked='no';
	}
	if(qty>0 && is_attr_checked!='no'){ //if user selected qty and attribute then success 




jQuery.ajax({
			
			url:FRONT_SITE_PATH+'manage_cart',
			type:'post',
			data:'qty='+qty+'&attt='+attr+'&type='+type,
			success:function(result){

                 var data=jQuery.parseJSON(result); //from manage_cart json will give us
				// alert(result);                          
				 // CDN is on footer link
				swal("Congratulation!", "Dish added successfully", "success");  //sweet alert js

				jQuery('#shop_added_msg_'+attr).html('(Added -'+qty+')');   
					

				jQuery('#totalCartDish').html(data.totalCartDish);
				jQuery('#totalPrice').html(data.totalPrice+' BDT');
				var tp1=data.totalPrice;
				if(data.totalCartDish==1){
					var tp=qty*data.price;
					var html='<div class="shopping-cart-content"><ul id="cart_ul"><li class="single-shopping-cart" id="attr_'+attr+'"><div class="shopping-cart-img"><a href="javascript:void(0)"><img alt="" src="'+SITE_DISH_IMAGE+data.image+'"></a></div><div class="shopping-cart-title"><h4><a href="javascript:void(0)">'+data.dish+'</a></h4><h6>Qty: '+qty+'</h6><span>'+tp+' BDT</span></div><div class="shopping-cart-delete"><a href="javascript:void(0)" onclick=delete_cart("'+attr+'")><i class="ion ion-close"></i></a></div></li></ul><h4>Total : <span class="shop-total" id="shopTotal">'+tp+' BDT</span></h4><div class="shopping-cart-btn"><a href="cart">view cart</a><a href="checkout">checkout</a></div></div>';	
					jQuery('.header-cart').append(html);
				}else{
					var tp=qty*data.price;
					jQuery("#attr_"+attr).remove();
					var html='<li class="single-shopping-cart" id="attr_'+attr+'"><div class="shopping-cart-img"><a href="#"><img alt="" src="'+SITE_DISH_IMAGE+data.image+'"></a></div><div class="shopping-cart-title"><h4><a href="javascript:void(0)">'+data.dish+'</a></h4><h6>Qty: '+qty+'</h6><span>'+tp+' BDT</span></div><div class="shopping-cart-delete"><a href="javascript:void(0)" onclick=delete_cart("'+attr+'")><i class="ion ion-close"></i></a></div></li>';
					jQuery('#cart_ul').append(html);
					jQuery('#shopTotal').html(tp1+ 'BDT');
				}
			}
		});


}else{    // other wise error
		swal("Error", "Please select qty and dish item", "error");
	}




}



//remove cart


function delete_cart(id,is_type){
	jQuery.ajax({
		url:FRONT_SITE_PATH+'manage_cart',
		type:'post',
		data:'attt='+id+'&type=delete',
		success:function(result){
			
			if(is_type=='load'){ //for cart delete page

				window.location.href=window.location.href;
			}

			else{

				var data=jQuery.parseJSON(result);
			
				jQuery('#totalCartDish').html(data.totalCartDish);
				jQuery('#shop_added_msg_'+id).html('');
				
				if(data.totalCartDish==0){
					jQuery('.shopping-cart-content').remove();
					jQuery('#totalPrice').html('');
				}else{
					var tp1=data.totalPrice;
					jQuery('#shopTotal').html(tp1+ 'BDT');
					jQuery('#attr_'+id).remove();
					jQuery('#totalPrice').html(data.totalPrice+' BDT');
				}
			}
			
		}
	});
}


