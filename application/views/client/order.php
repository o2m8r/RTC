<div class="container">

<!-- START SHOW PRODUCTS -->
	<div class="row">
		<br>
		<?php for($i = 0; $i < 20; $i++): ?>

		<div class="col s3">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?php echo TOOLS_DIR; ?>test_tube.jpg">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Item #<?php echo $i; ?><i class="material-icons right">more_vert</i></span>
					<div class="input-field">
						<i class="material-icons prefix">playlist_add</i>
						<input id="icon_<?php echo $i; ?>" type="text" class="validate" required>
						<label for="icon_<?php echo $i; ?>">Qty</label>
			        </div>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Item #<?php echo $i; ?><i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
		</div>

		<?php endfor; ?>

	</div>
<!-- END SHOW PRODUCTS -->

<!-- START FLOATING ACTION BUTTON -->
<div class="fixed-action-btn">
  <a class="waves-effect waves-light btn btn-large btn-floating modal-trigger" href="#sendModal">
    <i class="large material-icons">send</i>
  </a>
</div>
<!-- END FLOATING ACTION BUTTON --> 

</div>


<!-- START SEND MODAL -->
<div id="sendModal" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>Product Summary</h4>
    <div class="row">
      <div class="col s12">
      	...
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <center>
      <button class="btn waves-effect waves-green right" type="submit" name="action" style="width: 100%;">Send
      </button>
    </center>
  </div>
</div>
<!-- END SEND MODAL -->