
<?php
require_once("models/payment-status.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_status_id = $_POST['payment_status_id'];
    $status_name = $_POST['status_name'];
    $obj = new PaymentStatus($payment_status_id, $status_name);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Payment Status</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="payment-status" class="btn btn-primary mb-3">Back to Manage</a>

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
      <label for="payment_status_id">Payment Status Id</label>
      <input type="text" class="form-control" name="payment_status_id" id="payment_status_id">
    </div>
    <div class="form-group mb-3">
      <label for="status_name">Status Name</label>
      <input type="text" class="form-control" name="status_name" id="status_name">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
