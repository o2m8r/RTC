<?php if(isset($_SESSION['errors'])) echo $_SESSION['errors']; ?>

<script>
  function loadToPO(data){
    $('#order_no').val(data.value);
  }
  function loadPO(data){
    var src = '<?php echo base_url().'uploads/'; ?>'+data.value;
    document.getElementById('po').src = src;
  }
</script>
<div class="container">
  <br>
  <ul id="tabs-swipe-demo" class="tabs">
    <li class="tab col s3"><a class="active" href="#orders">Orders</a></li>
    <li class="tab col s3"><a href="#order_history">Order History</a></li>
  </ul>
  <div id="orders" class="col s12">

    <table class="centered striped" id="myTable">
      <thead>
        <tr>
            <th>Order #</th>
            <th>Date Quoted</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($this->m_ordered->get_ordered() as $row): ?>
        <tr>
          <td><?php echo sprintf('%05d', $row['order_no']); ?></td>
          <td><?php echo $row['date_created']; ?></td>

          <?php if(!empty($row['date_created'])): ?>
          <td><span class="badge green" style="color: white; border-radius: 10%;">Quoted</span></td>
          <td>
            <a class="waves-effect waves-light btn blue-grey lighten-1" href="quotation-report?id=<?php echo $row['order_no']; ?>" target="_blank">Print <i class="material-icons right">local_printshop</i></a>

            <?php if(empty($row['purchase_order'])){ ?>

              <button onclick="loadToPO(this);" value="<?php echo $row['order_no']; ?>" class="waves-effect waves-light btn green darken-1 modal-trigger" href="#POModal">Upload <i class="material-icons right">file_upload</i></button>

            <?php }else{ ?>

               <button onclick="loadPO(this);" value="<?php echo $row['purchase_order']; ?>" class="waves-effect waves-light btn blue darken-1 modal-trigger" href="#viewPOModal">View <i class="material-icons right">remove_red_eye</i></button>

            <?php }?>

          </td>
          <?php else: ?>
          <td><span class="badge red" style="color: white; border-radius: 10%;">Unquoted</span></td>
          <td>
            <button class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" href="#" disabled>Print <i class="material-icons right">local_printshop</i></button>
            <button class="waves-effect waves-light btn blue darken-1 modal-trigger" href="#POModal" disabled>Upload <i class="material-icons right">file_upload</i></button>
          </td>
          <?php endif; ?>

        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
  <div id="order_history" class="col s12">
    <table>
      <thead>
        <tr>
          <th>Order No.</th>
          <th>No. Of Items</th>
          <th>Date Delivered</th>
          <th>Total Amount</th>
          <th>Invoice</th>
          <th>Receipt</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>00001</td>
          <td><a href="#">43 items</a></td>
          <td>October 27, 2018</td>
          <td>20, 000.00</td>
          <td>
            <a class="waves-effect waves-light btn blue-grey lighten-1" href="quotation-report?id=<?php echo $row['order_no']; ?>" target="_blank">Print <i class="material-icons right">local_printshop</i></a>
          </td>
          <td>
            <a class="waves-effect waves-light btn blue-grey lighten-1" href="quotation-report?id=<?php echo $row['order_no']; ?>" target="_blank">Print <i class="material-icons right">local_printshop</i></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

	 
</div>

<!-- Modal Structure -->
<?php echo form_open_multipart('c-purchase-order/upload-po'); ?>
<input type="hidden" name="order_no" id="order_no">
  <div id="POModal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <form action="#">
        <div class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input type="file" name="purchase_order" required>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload Purchase Order">
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-green btn green" style="width: 100%;">UPLOAD PURCHASE ORDER</button>
    </div>
  </div>
<?php echo form_close(); ?>


<div id="viewPOModal" class="modal modal-fixed-footer">
  <div class="modal-content" style="overflow-x: hidden;">
    <img id="po" class="materialboxed" src="" height="100%" width="100%">
  </div>
  <div class="modal-footer">
    <button class="waves-effect waves-green btn red modal-close" style="width: 100%;">CLOSE</button>
  </div>
</div>