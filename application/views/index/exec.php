<?php if(isset($_SESSION['errors'])) echo $_SESSION['errors']; ?>
<div class="container" style="border: 1px solid black">
	<?php echo form_open('c-authentication/exec'); ?>
	<input type="email" name="email">
	<input type="password" name="password">
	<input type="submit" value="LOGIN">
	<?php echo form_close(); ?>
</div>