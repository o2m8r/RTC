<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<div class="container">
	 <table class="centered striped" id="myTable">
        <thead>
          <tr>
              <th>Order #</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>12345</td>
            <td>October 11, 1999</td>
            <td><span class="badge green" style="color: white; border-radius: 10%;">Paid</span></td>
            <td><a class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" href="#viewModal">View</a></td>
          </tr>
          <tr>
            <td>09876</td>
            <td>October 11, 1999</td>
            <td><span class="badge red" style="color: white; border-radius: 10%;">Unpaid</span></td>
            <td><a class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" href="#viewModal">View</a></td>
          </tr>
          <tr>
            <td>45677</td>
            <td>October 11, 1999</td>
            <td><span class="badge red" style="color: white; border-radius: 10%;">Unpaid</span></td>
            <td><a class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" href="#viewModal">View</a></td>
          </tr>
        </tbody>
      </table>
</div>

  <!-- Modal Structure -->
  <div id="viewModal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Order #: 12345</h4>
      <p>Name of the Client</p>
      <h6 style="color:red;"><b>Grand Total: $872</b></h6>
      <hr>
      <table>
        <thead>
          <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total Price</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>23</td>
            <td>$0.87</td>
            <td>$2.89</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>21</td>
            <td>$3.76</td>
            <td>$2.89</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>18</td>
            <td>$7.00</td>
            <td>$2.89</td>
          </tr>
        </tbody>
      </table>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
</script>