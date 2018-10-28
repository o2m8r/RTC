<script>
  function loadToReceipt(data){
    console.log(data.getAttribute('data-order-no'));
    $('#order_no').val(data.getAttribute('data-order-no'));
  }  
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<div class="container">
	<br>
	<ul id="tabs-swipe-demo" class="tabs">
		<li class="tab col s3"><a class="active" href="#pending">Pending</a></li>
		<li class="tab col s3"><a href="#collected">Collected</a></li>
	</ul>

	<div id="pending" class="col s12">

<?php
  function format_date($date){
    return date('F d, Y', strtotime($date));
  }
?>

    <table class="centered striped" id="myTable">
      <thead>
        <tr>
            <th>Order #</th>
            <th>Purchase Order</th>
            <th>Delivery Date</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($this->m_collections->get_pending_po() as $row): ?>
        <tr>
          <td><?php echo sprintf('%05d', $row['order_no']); ?></td>
          <td><img class="materialboxed" src="<?php echo base_url().'uploads/'.$row['purchase_order']; ?>" width="50" height="50"></td>
          <td><?php echo format_date($row['delivery']); ?></td>
          <td>
          	<a class="waves-effect waves-light btn blue-grey lighten-1" href="sales-invoice?id=<?php echo $row['order_no']; ?>" target="_blank">Invoice <i class="material-icons right">local_printshop</i></a>
            <?php if(date('Y-m-d', strtotime($row['delivery'])) == date('Y-m-d')): ?>
          	<a class="waves-effect waves-light btn green modal-trigger pulse" data-order-no="<?php echo $row['order_no']; ?>" onclick="loadToReceipt(this);" href="#checkInputModal">Receipt <i class="material-icons right">local_printshop</i></a>
            <?php else: ?>
            <button class="waves-effect waves-light btn green" disabled>Receipt <i class="material-icons right">local_printshop</i></button>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
  <div id="collected" class="col s12">
    
    <table class="centered striped" id="myTable">
      <thead>
        <tr>
            <th>Order #</th>
            <th>Client</th>
            <th>Date Collected</th> <!-- kelan naupload ung receipt -->
            <th>Purchase Order</th>
            <th>Quotations</th>
            <th>Invoice</th>
            <th>Receipt</th>
        </tr>
      </thead>
      <tbody>
        <?php #foreach($this->m_ordered->get_ordered() as $row): ?>
        <tr>
          <td>asd</td>
          <td>asd</td>
          <td>asd</td>
          <td>
          	<a class="waves-effect waves-light btn blue-grey lighten-1" href="sales-invoice?id=<?php #echo $row['order_no']; ?>" target="_blank">View <i class="material-icons right">local_printshop</i></a>
	      </td>
	      <td>
	      	<a class="waves-effect waves-light btn blue-grey lighten-1" href="sales-invoice?id=<?php #echo $row['order_no']; ?>" target="_blank">View <i class="material-icons right">local_printshop</i></a>
	      </td>
	      <td>
	      	<a class="waves-effect waves-light btn blue-grey lighten-1" href="sales-invoice?id=<?php #echo $row['order_no']; ?>" target="_blank">View <i class="material-icons right">local_printshop</i></a>
	      </td>
	      <td>
	      	<a class="waves-effect waves-light btn blue-grey lighten-1" href="sales-invoice?id=<?php #echo $row['order_no']; ?>" target="_blank">View <i class="material-icons right">local_printshop</i></a>
	      </td>
        </tr>
        <?php #endforeach; ?>
      </tbody>
    </table>

  </div>
</div>


<!-- Modal Structure -->
<?php echo form_open('admin/receipt-collection'); ?>
<input type="hidden" name="order_no" id="order_no">
<div id="checkInputModal" class="modal modal-fixed-footer" style="width: 80%;">
  <div class="modal-content" id="sales_invoice">
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">person</i>
        <input id="check_no" name="check_no" type="text" class="validate" required>
        <label for="check_no">Check No.</label>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="waves-effect waves-green btn green" style="width: 100%;">CREATE SALES INVOICE</button>
  </div>
</div>
<?php echo form_close(); ?>

<script>
  $(document).ready( function () {

      $('#myTable').DataTable();

      // for input masks
      $(":input").inputmask();

      $('#check_no').inputmask({ mask: "999999" });

  } );
</script>