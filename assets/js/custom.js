jQuery('#frmRegister').on('submit',function(e){
	jQuery('.error_field').html('');
	jQuery.ajax({
		url:'login_register_submit.php',
		type:'post',
		data:jQuery('#frmRegister').serialize(),
		
		success:function(result){
			
			var data=jQuery.parseJSON(result);  //data we get from url page we devide
			if(data.status=='error'){    //if in array we get status  error value then 
				jQuery('#'+data.field).html(data.msg);
			}
			if(data.status=='success'){
				jQuery('#'+data.field).html(data.msg);

				// after submitting reset all the value
				jQuery('#frmRegister')[0].reset();   
				
			}
		}
		
	});
	e.preventDefault();
});	