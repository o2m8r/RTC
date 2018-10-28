<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script>
  function loadToQuote(data){
    $("#orders_div").html('<center><div class="preloader-wrapper big active"> <div class="spinner-layer spinner-blue"> <div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div></center>');

    var order_no = data.getAttribute('data-id');

    $.ajax({
        url: "<?php echo base_url(); ?>/index.php/admin/quote",
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
            <?php if(!empty($row['date_created'])) { ?>
              <a class="waves-effect waves-light btn blue" href="quotation-report?id=<?php echo $row['order_no']; ?>" target="_blank">Print <i class="material-icons right">local_printshop</i></a>
            <?php }else{ ?>
              <a class="waves-effect waves-light btn green modal-trigger" href="#quoteModal" data-id="<?php echo $row['order_no']; ?>" onclick="loadToQuote(this);">Quote <i class="material-icons right">edit</i></a>
            <?php } ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
</div>

<!-- Modal Structure -->
<?php echo form_open('c-orders/quote'); ?>
<div id="quoteModal" class="modal modal-fixed-footer" style="width: 80%;">
  <div class="modal-content" id="orders_div">
    
  </div>
  <div class="modal-footer">
    <button class="waves-effect waves-green btn green" style="width: 100%;">SAVE</button>
  </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
  function check_date(element) {
 //get today's date in string
 var todayDate = new Date();
 //need to add one to get current month as it is start with 0
 var todayMonth = todayDate.getMonth() + 1;
 var todayDay = todayDate.getDate();
 var todayYear = todayDate.getFullYear();
 var todayDateText = todayDay + "/" + todayMonth + "/" + todayYear;
 //
 
//get date input from SharePoint DateTime Control
 var inputDateText = element.value;
 //
 
//Convert both input to date type
 var inputToDate = Date.parse(inputDateText);
 var todayToDate = Date.parse(todayDateText);
 //
 
//compare dates
 if (inputToDate > todayToDate) {alert("the input is later than today");}
 else if (inputToDate < todayToDate) {alert("the input is earlier than today");}
 else {alert("the input is same as today");}
 }

	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
</script>