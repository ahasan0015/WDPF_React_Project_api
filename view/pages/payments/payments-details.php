
<?php
require_once("models/payments.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Payments::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Payments</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="payments" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Payment Id</th>
    <td><?php echo htmlspecialchars($item['payment_id']); ?></td>
  </tr>
  <tr>
    <th>Booking Id</th>
    <td><?php echo htmlspecialchars($item['booking_id']); ?></td>
  </tr>
  <tr>
    <th>Amount</th>
    <td><?php echo htmlspecialchars($item['amount']); ?></td>
  </tr>
  <tr>
    <th>Payment Date</th>
    <td><?php echo htmlspecialchars($item['payment_date']); ?></td>
  </tr>
  <tr>
    <th>Payment Method Id</th>
    <td><?php echo htmlspecialchars($item['payment_method_id']); ?></td>
  </tr>
  <tr>
    <th>Payment Status Id</th>
    <td><?php echo htmlspecialchars($item['payment_status_id']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
