<div class="row">	
	<input type="hidden" name="order_no" value="<?php echo $this->input->post('order_no'); ?>">

	<div class="input-field col s4">
      <i class="material-icons prefix">subway</i>
      <input id="delivery" name="delivery" type="date" class="validate" required>
      <label for="delivery">Delivery</label>
    </div>
    <div class="input-field col s4">
    	<!-- <i class="material-icons prefix">swap_horiz</i> -->
	    <select id="terms" class="browser-default" name="terms">
	      <option value="" disabled selected>Choose your option</option>
	      <option value="Cash On Delivery">Cash On Delivery</option>
	    </select>
	    <label for="terms">Terms</label>
	</div>
    <div class="input-field col s4">
      <i class="material-icons prefix">timer</i>
      <input id="price_validity" name="price_validity" type="date" class="validate" required>
      <label for="price_validity">Price Validity</label>
    </div>

<?php foreach($this->m_quote->get_items($this->input->post('order_no')) as $row): ?>
	<input type="hidden" name="item_id[]" value="<?php echo $row['inq_itemID']; ?>">
	<input type="hidden" name="inq_qty[]" value="<?php echo $row['inq_quantity']; ?>">

	<div class="col s3">
		<div class="card hoverable">
	        <div class="card-image">
	          <img class="materialboxed" src="<?php echo TOOLS_DIR; ?>test_tube.jpg">
	          <span class="card-title activator grey-text text-darken-4"><?php echo $row['item_name']; ?></span>
	          <a class="btn-floating halfway-fab waves-effect waves-light blue lighten-3 activator"><i class="material-icons hoverable">info_outline</i></a>
	        </div>
	        <div class="card-content">
	          <div class="input-field">
					<i class="material-icons prefix">attach_money</i>
					<input id="icon_<?php echo $row['itemID']; ?>" class="currency" data-name="<?php echo $row['item_name']; ?>" name="qoutation[]" type="text" class="validate" required>
					<label for="icon_<?php echo $row['itemID']; ?>">Quotation</label>
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

<script>
	$(document).ready(function() {
	    // for input masks
	    $(":input").inputmask();

	    $(".currency").inputmask('currency', {
		  rightAlign: true,
		  prefix: '₱ '
		});

		$(".currency-center").inputmask('currency', {
		  rightAlign: false,
		  prefix: '₱ '
		});
	});
</script>