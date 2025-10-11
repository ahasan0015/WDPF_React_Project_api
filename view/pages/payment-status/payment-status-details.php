
<?php
require_once("models/payment-status.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = PaymentStatus::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Payment Status</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="payment-status" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Payment Status Id</th>
    <td><?php echo htmlspecialchars($item['payment_status_id']); ?></td>
  </tr>
  <tr>
    <th>Status Name</th>
    <td><?php echo htmlspecialchars($item['status_name']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
