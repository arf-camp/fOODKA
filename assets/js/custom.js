
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
			if(data.status=='success'){
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