<div class="container">
	<?php if(isset($_SESSION['errors'])) echo $_SESSION['errors']; ?>
  	<?php if(isset($_SESSION['msg'])) echo '<script>'.$_SESSION['msg'].'</script>'; ?>
<!-- START SHOW PRODUCTS -->
	<div class="row">
		<br>
		<?php foreach($this->m_order->get_stocks() as $row): ?>
		<input type="hidden" name="stock_id[]" value="<?php echo $row['itemID']; ?>">
		<input type="hidden" name="item_name[]" value="<?php echo $row['item_name']; ?>">
		<div class="col s3">
			<div class="card" style="height: 400px;">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?php echo TOOLS_DIR; ?>test_tube.jpg">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo $row['item_name']; ?><i class="material-icons right">more_vert</i></span>
					<div class="input-field">
						<i class="material-icons prefix">exposure</i>
						<input id="icon_<?php echo $row['itemID']; ?>" name="qty[]" type="text" class="validate" required>
						<label for="icon_<?php echo $row['itemID']; ?>">Qty</label>
			        </div>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?php echo $row['item_name']; ?><i class="material-icons right">close</i></span>
					<p>Description: <?php echo $row['description']; ?><br>Specifications: <?php echo $row['specification']; ?></p>
				</div>
			</div>
		</div>

		<?php endforeach; ?>

	</div>
<!-- END SHOW PRODUCTS -->

<!-- START FLOATING ACTION BUTTON -->
<div class="fixed-action-btn">
  <a class="waves-effect waves-light btn btn-large btn-floating modal-trigger" href="#sendModal" onclick="loadToOrder();">
    <i class="large material-icons">send</i>
  </a>
</div>
<!-- END FLOATING ACTION BUTTON --> 

</div>


<!-- START SEND MODAL -->
<?php echo form_open('c_client_order/order'); ?>
<div id="sendModal" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>Product Summary</h4>
    <div class="row">
      <div class="col s12" id="order_summary">
      	
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
<?php echo form_close(); ?>
<!-- END SEND MODAL -->


<script>
	function loadToOrder(){
		var all_id = document.querySelectorAll("input[name='stock_id[]']");
		var all_name = document.querySelectorAll("input[name='item_name[]']");
		var all_qty = document.querySelectorAll("input[name='qty[]']");

		document.getElementById('order_summary').innerHTML = '';

		for(var i = 0; i < all_id.length; i++){
			if(all_qty[i].value != null && all_qty[i].value != 0){ 
				document.getElementById('order_summary').innerHTML += '<input type="hidden" name="stock_id[]" value="'+all_id[i].value+'"><input type="hidden" name="qty[]" value="'+all_qty[i].value+'"><h6>'+all_name[i].value+'</h6><small>'+all_qty[i].value+' units</small>';
			}
		}
		
	}
</script>