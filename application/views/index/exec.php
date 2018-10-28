<?php if(isset($_SESSION['errors'])) echo $_SESSION['errors']; ?>
<div class="container" >
	<?php echo form_open('c-authentication/exec'); ?>
	<div class="row" style="padding: 130px;">
	    <div class="col s12">
	      <div class="card red">
	        <div class="row">
	        	<div class="col s12">
	        		<div class="card-content white-text">
			          <span class="card-title"><strong>Admin Login Page</strong></span>
						<div class="input-field col s12">
				          <input name="email" type="email" class="validate" placeholder="Email">
				          <label>Email</label>
				        </div>
			        </div>
			        <div class="col s12">
	        			<div class="input-field col s12">
					        <input name="password" type="password" class="validate" placeholder="Password">
					        <label>Password</label>
				        </div>
					</div>
	        	
	        	</div>
	        </div>
	        <div class="card-action">
	          	<button class="waves-effect waves-light btn red lighten-4 right" type="submit"  style="color: black;"> Login <i class="material-icons right"  style="color: black;">send</i></button>
	        </div>
	      </div>
	    </div>
  	</div>

	<?php echo form_close(); ?>
</div>