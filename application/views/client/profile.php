<div class="container">
	CLIENT PROFILE<br>
	<?php
		echo 'Name: '.$_SESSION['users_name'].'<br>';
		echo 'Intitution: '.$_SESSION['institution'].'<br>';
		echo 'Address: '.$_SESSION['address'].'<br>';
		echo 'Mobile: '.$_SESSION['mobile_number'].'<br>';
		echo 'Landline: '.$_SESSION['telephone_number'].'<br>';
		echo 'Email: '.$_SESSION['email'].'<br>';
	?>
</div>

