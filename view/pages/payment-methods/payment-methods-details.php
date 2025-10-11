
<?php
require_once("models/payment-methods.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = PaymentMethods::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Payment Methods</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="payment-methods" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Payment Method Id</th>
    <td><?php echo htmlspecialchars($item['payment_method_id']); ?></td>
  </tr>
  <tr>
    <th>Method Name</th>
    <td><?php echo htmlspecialchars($item['method_name']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
