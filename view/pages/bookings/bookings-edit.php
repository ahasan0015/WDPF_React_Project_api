
<?php
require_once("models/bookings.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = $_POST['booking_id'];
    $user_id = $_POST['user_id'];
    $booking_type_id = $_POST['booking_type_id'];
    $booking_date = $_POST['booking_date'];
    $total_price = $_POST['total_price'];
    $status_id = $_POST['status_id'];
    $obj = new Bookings($booking_id, $user_id, $booking_type_id, $booking_date, $total_price, $status_id);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = Bookings::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Bookings</h1>
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
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if(!empty($res)) { ?>
<div class="card">
  <form method="post">
    <div class="card-body">
      <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
      <div class="form-group mb-3">
        <label for="booking_id">Booking Id</label>
        <input type="text" class="form-control" name="booking_id" id="booking_id" value="<?php echo htmlspecialchars($res['booking_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="user_id">User Id</label>
        <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo htmlspecialchars($res['user_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="booking_type_id">Booking Type Id</label>
        <input type="text" class="form-control" name="booking_type_id" id="booking_type_id" value="<?php echo htmlspecialchars($res['booking_type_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="booking_date">Booking Date</label>
        <input type="text" class="form-control" name="booking_date" id="booking_date" value="<?php echo htmlspecialchars($res['booking_date']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="total_price">Total Price</label>
        <input type="text" class="form-control" name="total_price" id="total_price" value="<?php echo htmlspecialchars($res['total_price']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="status_id">Status Id</label>
        <input type="text" class="form-control" name="status_id" id="status_id" value="<?php echo htmlspecialchars($res['status_id']); ?>">
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
