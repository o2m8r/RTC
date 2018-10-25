<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<div class="container">
	 <table class="centered striped" id="myTable">
        <thead>
          <tr>
              <th>Order #</th>
              <th>Date</th>
              <th>Name</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>12345</td>
            <td>October 11, 1999</td>
            <td>Mark Christian Dacles</td>
            <td><a class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" href="#viewModal">View <i class="material-icons right">remove_red_eye</i></a></td>
          </tr>
          <tr>
            <td>09876</td>
            <td>October 11, 1999</td>
            <td>Richelle Mae Roque</td>
            <td><a class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" href="#viewModal">View <i class="material-icons right">remove_red_eye</i></a></td>
          </tr>
          <tr>
            <td>45677</td>
            <td>October 11, 1999</td>
            <td>Daniel Christopher Ibanez</td>
            <td><a class="waves-effect waves-light btn blue-grey lighten-1 modal-trigger" href="#viewModal">View <i class="material-icons right">remove_red_eye</i></a></td>
          </tr>
        </tbody>
      </table>
</div>

  <!-- Modal Structure -->
  <div id="viewModal" class="modal modal-fixed-footer" style="width: 80%;">
    <div class="modal-content">
      <div class="row">
		<br>
		<?php for($i = 0; $i < 20; $i++): ?>

		<div class="col s3">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?php echo TOOLS_DIR; ?>test_tube.jpg">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Item #<?php echo $i; ?><i class="material-icons right">more_vert</i></span>
					<div class="input-field">
						<i class="material-icons prefix">attach_money</i>
						<input id="icon_<?php echo $i; ?>" type="text" class="validate" required>
						<label for="icon_<?php echo $i; ?>">Price</label>
			        </div>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Item #<?php echo $i; ?><i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
		</div>

		<?php endfor; ?>

	</div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn green"><b>Save</b></a>
    </div>
  </div>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
</script>