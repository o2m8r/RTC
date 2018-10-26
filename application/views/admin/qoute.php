<div class="row">	
	<input type="hidden" name="order_no" value="<?php echo $this->input->post('order_no'); ?>">

	<div class="input-field col s4">
      <i class="material-icons prefix">person</i>
      <input id="delivery" name="delivery" type="date" class="validate" required>
      <label for="delivery">Delivery</label>
    </div>
    <div class="input-field col s4">
      <i class="material-icons prefix">person</i>
      <input id="terms" name="terms" type="text" class="validate" required>
      <label for="terms">Terms</label>
    </div>
    <div class="input-field col s4">
      <i class="material-icons prefix">person</i>
      <input id="price_validity" name="price_validity" type="date" class="validate" required>
      <label for="price_validity">Price Validity</label>
    </div>

<?php foreach($this->m_qoute->get_items($this->input->post('order_no')) as $row): ?>
	<input type="hidden" name="item_id[]" value="<?php echo $row['inq_itemID']; ?>">
	<input type="hidden" name="inq_qty[]" value="<?php echo $row['inq_quantity']; ?>">

	<div class="col s3">
		<div class="card" style="height: 400px;">
			<div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="<?php echo TOOLS_DIR; ?>test_tube.jpg">
			</div>
			<div class="card-content">
				<span class="card-title activator grey-text text-darken-4"><?php echo $row['item_name']; ?><i class="material-icons right">more_vert</i></span>
				<div class="input-field">
					<i class="material-icons prefix">exposure</i>
					<input id="icon_<?php echo $row['itemID']; ?>" name="qoutation[]" type="text" class="validate" required>
					<label for="icon_<?php echo $row['itemID']; ?>">Qoutation</label>
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