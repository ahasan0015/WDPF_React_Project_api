
<?php
require_once("models/booking-status.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status_id = $_POST['status_id'];
    $status_name = $_POST['status_name'];
    $obj = new BookingStatus($status_id, $status_name);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = BookingStatus::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Booking Status</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="booking-status" class="btn btn-primary mb-3">Back to Manage</a>

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
        <label for="status_id">Status Id</label>
        <input type="text" class="form-control" name="status_id" id="status_id" value="<?php echo htmlspecialchars($res['status_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="status_name">Status Name</label>
        <input type="text" class="form-control" name="status_name" id="status_name" value="<?php echo htmlspecialchars($res['status_name']); ?>">
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
