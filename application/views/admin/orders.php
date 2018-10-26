<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script>
  function loadToQoute(data){

    var order_no = data.getAttribute('data-id');

    $.ajax({
        url: "<?php echo base_url(); ?>/index.php/admin/qoute",
        dataType: 'text',
        type: "POST",
        data: "order_no=" + order_no,
        success: function (result) {
          $("#orders_div").html(result);
        },
        error: function () {
            M.toast({html: 'Error!', classes: 'rounded'});
        }
    });
  }
</script>

<div class="container">
	 <table class="centered striped" id="myTable">
        <thead>
          <tr>
              <th>Order #</th>
              <th>Name</th>
              <th>Institution</th>
              <th>Address</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($this->m_orders->get_orders() as $row): ?>
          <tr>
            <td><?php echo sprintf('%05d', $row['order_no']); ?></td>
            <td><?php echo $row['users_name']; ?></td>
            <td><?php echo $row['institution']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
              <a class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" href="#qouteModal" data-id="<?php echo $row['order_no']; ?>" onclick="loadToQoute(this);">View <i class="material-icons right">remove_red_eye</i></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
</div>

<!-- Modal Structure -->
<?php echo form_open('c-orders/qoute'); ?>
<div id="qouteModal" class="modal modal-fixed-footer" style="width: 80%;">
  <div class="modal-content" id="orders_div">
    
  </div>
  <div class="modal-footer">
    <button class="waves-effect waves-green btn green" style="width: 100%;">SAVE</button>
  </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
</script>