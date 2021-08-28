<?php
include ("header.php");
require('paykey.php');//data-amount="1000"    //data-email="tysonfarib@gmail.com"


?>
<form action="walletsubmit.php" method="post">
	<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishableKey?>"
	    
		data-name="FoodKa Developer Team"
		data-description="online food ordering payment"
		data-image="myLogo.jpg"
		data-currency="BDT"
		
	
		
	>
	</script>

</form>