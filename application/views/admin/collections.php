<script>
  function loadToReceipt(data){
    console.log(data.getAttribute('data-order-no'));
    $('#order_no').val(data.getAttribute('data-order-no'));
  }  
</script>

<div class="container">
	<br>
	<ul id="tabs-swipe-demo" class="tabs">
		<li class="tab col s3"><a class="active" href="#pending">Pending</a></li>
		<li class="tab col s3"><a href="#collected">Collected</a></li>
	</ul>

	<div id="pending" class="col s12">

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
        <?php #foreach($this->m_ordered->get_ordered() as $row): ?>
        <tr>
          <td>asd</td>
          <td>asd</td>
          <td>asd</td>
          <td>
          	<a class="waves-effect waves-light btn blue-grey lighten-1" href="sales-invoice?id=<?php #echo $row['order_no']; ?>" target="_blank">Invoice <i class="material-icons right">local_printshop</i></a>

          	<a class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" data-order-no="2" onclick="loadToReceipt(this);" href="#checkInputModal">Receipt <i class="material-icons right">local_printshop</i></a>
          </td>
        </tr>
        <?php #endforeach; ?>
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
<?php echo form_open('admin/collection-receipt', array('target' => '_blank')); ?>
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