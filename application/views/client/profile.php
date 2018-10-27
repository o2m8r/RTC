<div class="container">

	<div class="row">
		<div class="col l2">
			
		</div>
		<div class="col l8">
			<h3 style="text-align: center;">Client's Profile</h3>
			<div class="row">
			    <?php echo form_open('c-authentication/update'); ?>
			    <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']?>">
			      <div class="row">
			        <div class="input-field col s12">
			          <input type="text" class="validate" name="name" value="<?php echo $_SESSION['users_name']; ?>">
			          <label>Name</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input value="<?php echo $_SESSION['institution'] ?>" name="institution" type="text" class="validate">
			          <label>Institution</label>
			        </div>
			        <div class="input-field col s6">
			          <input value="<?php echo $_SESSION['address'] ?>" name="address" type="text" class="validate">
			          <label>Address</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input value="<?php echo $_SESSION['mobile_number'] ?>" name="mobile_number" type="text" class="validate">
			          <label>Mobile Number</label>
			        </div>
			        <div class="input-field col s6">
			          <input value="<?php echo $_SESSION['telephone_number'] ?>" name="landline" type="text" class="validate">
			          <label>Telephone Number</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input name="email" type="email" class="validate" value="<?php echo $_SESSION['email'] ?>">
			          <label>Email</label>
			        </div>
			      </div>
			      <div class="row">
			      	<button class="btn waves-effect waves-green blue right"><i class="material-icons left">update</i> Update</button>
			      </div>
			    <?php echo form_close(); ?>
			 </div>
		</div>
		<div class="col l2">
			
		</div>
	</div>
</div>

