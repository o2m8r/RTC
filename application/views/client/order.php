<div class="container">

	<center>
		<ul class="pagination">
			<li id="a" class="waves-effect"><a href="?q=a">A</a></li>
			<li id="b" class="waves-effect"><a href="?q=b">B</a></li>
			<li id="c" class="waves-effect"><a href="?q=c">C</a></li>
			<li id="d" class="waves-effect"><a href="?q=d">D</a></li>
			<li id="e" class="waves-effect"><a href="?q=e">E</a></li>
			<li id="f" class="waves-effect"><a href="?q=f">F</a></li>
			<li id="g" class="waves-effect"><a href="?q=g">G</a></li>
			<li id="h" class="waves-effect"><a href="?q=h">H</a></li>
			<li id="i" class="waves-effect"><a href="?q=i">I</a></li>
			<li id="j" class="waves-effect"><a href="?q=j">J</a></li>
			<li id="k" class="waves-effect"><a href="?q=k">K</a></li>
			<li id="l" class="waves-effect"><a href="?q=l">L</a></li>
			<li id="m" class="waves-effect"><a href="?q=m">M</a></li>
			<li id="n" class="waves-effect"><a href="?q=n">N</a></li>
			<li id="o" class="waves-effect"><a href="?q=o">O</a></li>
			<li id="p" class="waves-effect"><a href="?q=p">P</a></li>
			<li id="q" class="waves-effect"><a href="?q=q">Q</a></li>
			<li id="r" class="waves-effect"><a href="?q=r">R</a></li>
			<li id="s" class="waves-effect"><a href="?q=s">S</a></li>
			<li id="t" class="waves-effect"><a href="?q=t">T</a></li>
			<li id="u" class="waves-effect"><a href="?q=u">U</a></li>
			<li id="v" class="waves-effect"><a href="?q=v">V</a></li>
			<li id="w" class="waves-effect"><a href="?q=w">W</a></li>
			<li id="x" class="waves-effect"><a href="?q=x">X</a></li>
			<li id="y" class="waves-effect"><a href="?q=y">Y</a></li>
			<li id="z" class="waves-effect"><a href="?q=z">Z</a></li>
		</ul>
	</center>
    <?php
    	if(isset($_GET['q'])){
    		echo '<script>';
    		echo 'document.getElementById(\''.$_GET['q'].'\').classList.add(\'active\');';
    		echo '</script>';
    	}
    ?>

	<?php if(isset($_SESSION['errors'])) echo $_SESSION['errors']; ?>
  	<?php if(isset($_SESSION['msg'])) echo '<script>'.$_SESSION['msg'].'</script>'; ?>
<!-- START SHOW PRODUCTS -->
	<div class="row">
		<br>
		<?php 
			$q = !isset($_GET['q']) ? '' : $_GET['q'];
			if(count($this->m_order->get_stocks($q)) == 0){
				echo '<center><h3>No products available...</h3></center>';
			}
			foreach($this->m_order->get_stocks($q) as $row): ?>
		<input type="hidden" name="stock_id[]" value="<?php echo $row['itemID']; ?>">
		<input type="hidden" name="item_name[]" value="<?php echo $row['item_name']; ?>">
		<div class="col s3">
			<div class="card hoverable">
		        <div class="card-image">
		          <img class="materialboxed" src="<?php echo TOOLS_DIR; ?>test_tube.jpg">
		          <span class="card-title activator grey-text text-darken-4"><?php echo $row['item_name']; ?></span>
		          <a class="btn-floating halfway-fab waves-effect waves-light blue lighten-3 activator"><i class="material-icons hoverable">info_outline</i></a>
		        </div>
		        <div class="card-content">
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
  <a id="send" class="waves-effect waves-light btn btn-large btn-floating modal-trigger pulse" href="#sendModal" onclick="loadToOrder();">
    <i class="large material-icons">send</i>
  </a>
</div>
<!-- END FLOATING ACTION BUTTON --> 

<div class="tap-target" data-target="send">
	<div class="tap-target-content">
	  <h5>Notice:</h5>
	  <p style="color: white;">Click here to check/submit your orders.</p>
	</div>
</div>

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
      <button id="submitButton" class="btn waves-effect waves-green right" type="submit" name="action" style="width: 100%;">Send
      </button>
    </center>
  </div>
</div>
<?php echo form_close(); ?>
<!-- END SEND MODAL -->


<script>
	function loadToOrder(){
		$('.tap-target').tapTarget('close');
		var all_id = document.querySelectorAll("input[name='stock_id[]']");
		var all_name = document.querySelectorAll("input[name='item_name[]']");
		var all_qty = document.querySelectorAll("input[name='qty[]']");
		var order_count = 0;
		var orders = '';
		document.getElementById('order_summary').innerHTML = '';

		for(var i = 0; i < all_id.length; i++){
			if(all_qty[i].value != null && all_qty[i].value != 0){ 
				order_count += 1;
				orders += '<input type="hidden" name="stock_id[]" value="'+all_id[i].value+'"><input type="hidden" name="qty[]" value="'+all_qty[i].value+'"><h6>'+all_name[i].value+'</h6><small>'+all_qty[i].value+'</small>';
			}
		}

		if(order_count > 0){
			document.getElementById('order_summary').innerHTML = orders;
			document.getElementById('submitButton').disabled = false;
		}else{
			document.getElementById('order_summary').innerHTML = '<h3>No orders selected.</h3>';
			document.getElementById('submitButton').disabled = true;
			M.toast({html: 'No selected orders to order!', classes: 'rounded #b71c1c red darken-4'});
		}
		
	}

	$(document).ready(function(){
		// feature discovery
		$('.tap-target').tapTarget('open');

		$('input[name="qty[]"]').inputmask({ mask: "9[999999] piece\\s", greedy: false });
	});
</script>