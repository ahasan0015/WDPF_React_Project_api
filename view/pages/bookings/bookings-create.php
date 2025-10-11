
<?php
require_once("models/bookings.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = $_POST['booking_id'];
    $user_id = $_POST['user_id'];
    $booking_type_id = $_POST['booking_type_id'];
    $booking_date = $_POST['booking_date'];
    $total_price = $_POST['total_price'];
    $status_id = $_POST['status_id'];
    $obj = new Bookings($booking_id, $user_id, $booking_type_id, $booking_date, $total_price, $status_id);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Bookings</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="bookings" class="btn btn-primary mb-3">Back to Manage</a>

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
      <label for="booking_id">Booking Id</label>
      <input type="text" class="form-control" name="booking_id" id="booking_id">
    </div>
    <div class="form-group mb-3">
      <label for="user_id">User Id</label>
      <input type="text" class="form-control" name="user_id" id="user_id">
    </div>
    <div class="form-group mb-3">
      <label for="booking_type_id">Booking Type Id</label>
      <input type="text" class="form-control" name="booking_type_id" id="booking_type_id">
    </div>
    <div class="form-group mb-3">
      <label for="booking_date">Booking Date</label>
      <input type="text" class="form-control" name="booking_date" id="booking_date">
    </div>
    <div class="form-group mb-3">
      <label for="total_price">Total Price</label>
      <input type="text" class="form-control" name="total_price" id="total_price">
    </div>
    <div class="form-group mb-3">
      <label for="status_id">Status Id</label>
      <input type="text" class="form-control" name="status_id" id="status_id">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
