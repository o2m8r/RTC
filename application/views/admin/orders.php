<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script>
  function loadToQuote(data){
    $("#orders_div").html('<center><div class="preloader-wrapper big active"> <div class="spinner-layer spinner-blue"> <div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div></center>');

    var order_no = data.getAttribute('data-id');

    $.ajax({
        url: "<?php echo base_url(); ?>index.php/admin/quote",
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
<?php echo form_open('c-orders/quote', array('onsubmit' => 'return check_form();')); ?>
<div id="quoteModal" class="modal modal-fixed-footer" style="width: 80%;">
  <div class="modal-content" id="orders_div">
    
  </div>
  <div class="modal-footer">
    <button class="waves-effect waves-green btn green" style="width: 100%;">SAVE</button>
  </div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
  function check_form(){
    var delivery        = $('#delivery').val();
    var price_validity  = $('#price_validity').val();
    var quotations      = document.querySelectorAll('input[name="qoutation[]"]');
    var errors = 0;
    var error_msg = [];
    var error_pop = '';

    // console.log(delivery);
    // console.log(price_validity);

    if(check_date(delivery) === false){ errors += 1; error_msg.push('Delivery Date must be greater than the current date.'); }
    if(check_date(price_validity) === false){ errors += 1; error_msg.push('Price Validity must be greater than the current date.'); }

    // validate all quotations
    for(var i = 0; i < quotations.length; i++){
      if(quotations[i].value == '' || quotations[i].value == null){
        errors += 1;
        error_msg.push(quotations[i].getAttribute('data-name')+' is not yet quoted.');
      }
    }

    if(errors > 0){
      for(var e = 0; e < error_msg.length; e++){
        error_pop += error_msg[e]+'<br>';
      }
      M.toast({html: error_pop, classes: 'rounded red'});
      // alert(error_pop);
    }

    // console.log(check_date(delivery));
    // console.log(check_date(price_validity));

    return errors == 0 ? true : false;
  }

  function check_date(val) {

    var todayDate = new Date();

    var todayMonth = todayDate.getMonth() + 1; // add 1 kasi ung January ay 0
    var todayDay = todayDate.getDate();
    var todayYear = todayDate.getFullYear();
    var todayDateText = todayMonth + "/" + todayDay + "/" + todayYear;
    //

    var inputDateText = val;
    //

    // convert sa date type
    var inputToDate = Date.parse(inputDateText);
    var todayToDate = Date.parse(todayDateText);
    //
    //console.log('input: '+inputDateText+' date: '+todayDateText);

    return inputToDate <= todayToDate ? false : true;
    // compare dates
    // if (inputToDate > todayToDate) {alert("the input is later than today");}
    // else if (inputToDate < todayToDate) {alert("the input is earlier than today");}
    // else {alert("the input is same as today");}
  }

	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
</script>