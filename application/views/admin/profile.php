<?php if(isset($_SESSION['errors'])) echo $_SESSION['errors']; ?>
<div class="container">

	<div class="row">
		<div class="col l2">
			
		</div>
		<div class="col l8">
			<h3 style="text-align: center;">Admin's Profile</h3>
			<div class="row">
			    <?php echo form_open('c-authentication/update_admin'); ?>
			    <input type="hidden" name="adminID" value="<?php echo $_SESSION['adminID']?>">
			      <div class="row">
			        <div class="input-field col s12">
			          <input type="text" class="validate" name="admin_name" value="<?php echo $_SESSION['admin_name']; ?>">
			          <label>Name</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s6">
			          <input value="<?php echo $_SESSION['position'] ?>" name="position" type="text" class="validate">
			          <label>Position</label>
			        </div>
			        <div class="row">
				        <div class="input-field col s12">
				          <input value="<?php echo $_SESSION['specimen'] ?>" name="specimen" type="text" class="validate">
				          <label>Specimen</label>
				        </div>
				      </div>
			        <div class="input-field col s6">
			          <input value="<?php echo $_SESSION['email'] ?>" name="email" type="text" class="validate">
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

