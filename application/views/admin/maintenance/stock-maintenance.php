<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<div class="container">
	<?php if(isset($_SESSION['errors'])) echo $_SESSION['errors']; ?>
	<?php if(isset($_SESSION['msg'])) echo '<script>'.$_SESSION['msg'].'</script>'; ?>
	<table id="stocks_tbl" class="striped centered">
		<thead>
		  <tr>
		      <th>Item Name</th>
		      <th>Picture</th>
		      <th>Item Quantity</th>
		      <th>Description</th>
		      <th>Specification</th>
		      <th>Actions</th>
		  </tr>
		</thead>

		<tbody>
			<?php foreach($this->m_stock_maintenance->get_stocks() as $row): ?>
			<tr>
				<td><?php echo $row['item_name']; ?></td>
				<td>
					<img class="materialboxed" src="<?php echo base_url().'uploads/'.$row['picture']; ?>" width="50" height="50">
				</td>
				<td><?php echo $row['item_quantity']; ?></td>
				<td><?php echo $row['description']; ?></td>
				<td><?php echo $row['specification']; ?></td>
				<td>
					<a class="btn waves-effect waves-light modal-trigger blue" href="#viewModal<?php echo $row['itemID']; ?>" data-id="<?php echo $row['itemID']; ?>"><i class="material-icons" onclick="loadToView(this);">remove_red_eye</i></a>
					<a class="btn waves-effect waves-light modal-trigger green" href="#editModal<?php echo $row['itemID']; ?>" data-id="<?php echo $row['itemID']; ?>"><i class="material-icons" onclick="loadToEdit(this);">create</i></a>
					<a class="btn waves-effect waves-light modal-trigger red" href="#deleteModal<?php echo $row['itemID']; ?>" data-id="<?php echo $row['itemID']; ?>"><i class="material-icons" onclick="loadToDelete(this);">delete</i></a>
				</td>
			</tr>

      <!-- START VIEW MODAL -->
      <div id="viewModal<?php echo $row['itemID']; ?>" class="modal">
        <div class="modal-content">
          <h4><b>View Stock</b></h4>
            <div class="row">
              <div class="col s6">
                <img src="<?php echo base_url().'uploads/'.$row['picture']; ?>" style="width: 300px; height: 300px; padding: 5px;">
              </div>
              <div class="col s6">
                <h6><b>Item Name: </b><?php echo $row['item_name']; ?></h6>
                <h6><b>Description: </b><?php echo $row['description']; ?></h6>
                <h6><b>Quantity: </b><?php echo $row['item_quantity']; ?></h6>
                <h6><b>Specification: </b><?php echo $row['specification']; ?></h6>
                <h6><b>Type: </b><?php echo $row['type']; ?></h6>
              </div>
            </div>
        </div>
      </div>
      <!-- END VIEW MODAL -->

      <!-- START EDIT MODAL -->
      <div id="editModal<?php echo $row['itemID']; ?>" class="modal" style="overflow-y: hidden;">
        <div class="modal-content">
          <h4><b>Edit Stock</b></h4>
            <div class="row">
              <div class="col s6">
                <img src="<?php echo base_url().'uploads/'.$row['picture']; ?>" style="width: 300px; height: 300px;">
              </div>
              <div class="col s6">
                    <div class="row">
                      <?php echo form_open_multipart('c-stock-maintenance/update'); ?>
                      <input type="hidden" name="itemID" value="<?php echo $row['itemID']; ?>"">
                      <div class="input-field col s6">
                        <input placeholder="Placeholder" name="item_name" type="text" class="validate" value="<?php echo $row['item_name']; ?>">
                        <label for="item_name">Item Name</label>
                      </div>
                      <div class="input-field col s6">
                        <input name="quantity" type="text" class="validate" value="<?php echo $row['item_quantity']; ?>">
                        <label for="quantity">Quantity</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input name="specification" type="text" class="validate"value="<?php echo $row['specification']; ?>">
                        <label for="specification">Specification</label>
                      </div>
                      <div class="input-field col s6">
                        <input name="type" type="text" class="validate" value="<?php echo $row['type']; ?>">
                        <label for="type">Type</label>
                      </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                          <input name="description" type="text" class="validate" value="<?php echo $row['description']; ?>">
                          <label for="description">Description</label>
                        </div>
                    </div>
                    <div class="row right">
                      <div class="input-field col s12">
                        <button class="waves-effect waves-light btn green"><i class="material-icons left">update</i>Update</button>
                      </div>
                    </div>
                    <?php echo form_close(); ?>
              </div>
            </div>
        </div>
      </div>
      <!-- END EDIT MODAL -->

      <!-- END DELETE MODAL -->
      <div id="deleteModal<?php echo $row['itemID']; ?>" class="modal">
        <div class="modal-content">
          <h4><b>Delete Stock</b></h4>
            <h5>Do you really want to delete <?php echo $row['item_name']; ?></h5>
        </div>
        <div class="modal-footer">
          <?php echo form_open_multipart('c-stock-maintenance/delete'); ?>
          <input type="hidden" name="itemID" value="<?php echo $row['itemID']; ?>">
            <button class="modal-close waves-effect waves-green btn green"><b>Yes</b></button>
          <?php echo form_close(); ?>
        </div>
      </div>
      <!-- END DELETE MODAL -->

			<?php endforeach; ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	$(document).ready( function () {
	    $('#stocks_tbl').DataTable();
	} );
</script>


<div class="fixed-action-btn">
  <a class="btn-floating btn-large green waves-effect waves-light modal-trigger" href="#addModal"> 
    <i class="large material-icons">add_circle_outline</i>
  </a>
</div>

<!-- START ADD MODAL -->
<?php echo form_open_multipart('c-stock-maintenance/create'); ?>
<div id="addModal" class="modal modal-fixed-footer">
  <div class="modal-content" style="overflow-x: hidden;">
    <h4>Add Stock</h4>
    <div class="row">

    	<div class="col s12 col m12">
    		<center>
    			<img class="materialboxed" width="350" height="200" src="<?php echo TOOLS_DIR; ?>test_tube.jpg">
    			<div class="file-field input-field">
			      <div class="btn">
			        <span>Upload</span>
			        <input type="file" name="item_image">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" name="" type="text">
			      </div>
			    </div>
			    <div class="input-field">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="icon_prefix" type="text" name="item_name" class="validate" required>
		          <label for="icon_prefix">Item Name</label>
		        </div>
    		</center>
    	</div>
        
        <div class="input-field col s12 col m12">
          <i class="material-icons prefix">lock</i>
          <textarea id="quantity" name="quantity" class="materialize-textarea"></textarea>
          <label for="quantity">Quantity</label>
        </div>
        <div class="input-field col s12 col m12">
          <i class="material-icons prefix">lock</i>
          <textarea id="description" name="description" class="materialize-textarea"></textarea>
          <label for="description">Description</label>
        </div>
        <div class="input-field col s12 col m12">
          <i class="material-icons prefix">lock</i>
          <textarea id="specification" name="specification" class="materialize-textarea"></textarea>
          <label for="specification">Specification</label>
        </div>


    </div>
  </div>
  <div class="modal-footer">
    <center>
      <button class="btn waves-effect waves-green right" type="submit" style="width: 100%;">ADD
      </button>
    </center>
  </div>
</div>
<?php echo form_close(); ?>
<!-- END ADD MODAL -->

