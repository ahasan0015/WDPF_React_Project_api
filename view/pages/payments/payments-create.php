
<?php
require_once("models/payments.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_id = $_POST['payment_id'];
    $booking_id = $_POST['booking_id'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $payment_method_id = $_POST['payment_method_id'];
    $payment_status_id = $_POST['payment_status_id'];
    $obj = new Payments($payment_id, $booking_id, $amount, $payment_date, $payment_method_id, $payment_status_id);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Payments</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="payments" class="btn btn-primary mb-3">Back to Manage</a>

<?php if($msg) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg; ?>
  <button type="button" class="btn-close close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<form method="post">
  <input type="hidden" name="id">
  <div class="card-body">
    <div class="form-group mb-3">
      <label for="payment_id">Payment Id</label>
      <input type="text" class="form-control" name="payment_id" id="payment_id">
    </div>
    <div class="form-group mb-3">
      <label for="booking_id">Booking Id</label>
      <input type="text" class="form-control" name="booking_id" id="booking_id">
    </div>
    <div class="form-group mb-3">
      <label for="amount">Amount</label>
      <input type="text" class="form-control" name="amount" id="amount">
    </div>
    <div class="form-group mb-3">
      <label for="payment_date">Payment Date</label>
      <input type="text" class="form-control" name="payment_date" id="payment_date">
    </div>
    <div class="form-group mb-3">
      <label for="payment_method_id">Payment Method Id</label>
      <input type="text" class="form-control" name="payment_method_id" id="payment_method_id">
    </div>
    <div class="form-group mb-3">
      <label for="payment_status_id">Payment Status Id</label>
      <input type="text" class="form-control" name="payment_status_id" id="payment_status_id">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
