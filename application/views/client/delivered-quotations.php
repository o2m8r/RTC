<?php foreach($this->m_delivered_quotations->get_heading($_POST['order_no']) as $row): ?>
<h4>Order #: <?php echo sprintf('%05d', $row['order_no']); ?></h4>
<p><?php echo $row['users_name']; ?></p>
<h6 style="color:red;"><b>Grand Total: ₱ <?php echo $row['Total_Amount']; ?></b></h6>
<?php endforeach; ?>
<hr>
<table>
  <thead>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($this->m_delivered_quotations->get_items_quote($_POST['order_no']) as $row): ?>
    <tr>
      <td><?php echo $row['item_name']; ?></td>
      <td><?php echo $row['inq_quantity']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>