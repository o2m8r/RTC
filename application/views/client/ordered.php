<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

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

<script>
  function viewQuotations(data){
    $("#quotations_div").html('<center><div class="preloader-wrapper big active"> <div class="spinner-layer spinner-blue"> <div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div></center>');

    var order_no = data.getAttribute('data-id');

    $.ajax({
        url: "<?php echo base_url(); ?>index.php/client/delivered-quotations",
        dataType: 'text',
        type: "POST",
        data: "order_no=" + order_no,
        success: function (result) {
          $("#quotations_div").html(result);
        },
        error: function () {
            M.toast({html: 'Error!', classes: 'rounded'});
        }
    });
  }
</script>

<?php
  function format_date($date){
    return date('F d, Y', strtotime($date));
  }
?>

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
    <table id="order_history_tbl" class="centered striped">
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
        <?php foreach($this->m_ordered->get_all_collected() as $row): ?>
        <tr>
          <td><?php echo sprintf('%05d', $row['order_no']); ?></td>
          <td><a href="#viewQuotationsModal" class="modal-trigger" data-id="<?php echo $row['order_no']; ?>" onclick="viewQuotations(this);"><?php echo $row['Total_Items']; ?> items</a></td>
          <td><?php echo format_date($row['date_receive']); ?></td>
          <td>₱ <?php echo $row['Total_Amount']; ?></td>
          <td>
            <a class="waves-effect waves-light btn blue-grey lighten-1" href="sales-invoice?id=<?php echo $row['order_no']; ?>" target="_blank">Print <i class="material-icons right">local_printshop</i></a>
          </td>
          <td>
            <a class="waves-effect waves-light btn blue-grey lighten-1" href="collection-receipt?id=<?php echo $row['order_no']; ?>" target="_blank">Print <i class="material-icons right">local_printshop</i></a>
          </td>
        </tr>
        <?php endforeach; ?>
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

<!-- START QUOTATIONS -->
<div id="viewQuotationsModal" class="modal modal-fixed-footer">
  <div class="modal-content" id="quotations_div">
    
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat red" style="width: 100%; text-align: center;">CLOSE</a>
  </div>
</div>
<!-- END QUOTATIONS -->

<script>
  $(document).ready( function () {
      $('#myTable').DataTable();
      $('#order_history_tbl').DataTable();
  });
</script>