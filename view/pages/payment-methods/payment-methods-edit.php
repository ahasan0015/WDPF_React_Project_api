
<?php
require_once("models/payment-methods.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_method_id = $_POST['payment_method_id'];
    $method_name = $_POST['method_name'];
    $obj = new PaymentMethods($payment_method_id, $method_name);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = PaymentMethods::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Payment Methods</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="payment-methods" class="btn btn-primary mb-3">Back to Manage</a>

<?php if($msg) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg; ?>
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if(!empty($res)) { ?>
<div class="card">
  <form method="post">
    <div class="card-body">
      <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
      <div class="form-group mb-3">
        <label for="payment_method_id">Payment Method Id</label>
        <input type="text" class="form-control" name="payment_method_id" id="payment_method_id" value="<?php echo htmlspecialchars($res['payment_method_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="method_name">Method Name</label>
        <input type="text" class="form-control" name="method_name" id="method_name" value="<?php echo htmlspecialchars($res['method_name']); ?>">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </form>
</div>
<?php } ?>

    </div>
  </section>
</div>
