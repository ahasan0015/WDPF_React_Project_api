
<?php
require_once("models/booking-flights.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $booking_id = $_POST['booking_id'];
    $flight_id = $_POST['flight_id'];
    $seat_class_id = $_POST['seat_class_id'];
    $price = $_POST['price'];
    $obj = new BookingFlights($id, $booking_id, $flight_id, $seat_class_id, $price);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = BookingFlights::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Booking Flights</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="booking-flights" class="btn btn-primary mb-3">Back to Manage</a>

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
        <label for="flight_id">Flight Id</label>
        <input type="text" class="form-control" name="flight_id" id="flight_id" value="<?php echo htmlspecialchars($res['flight_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="seat_class_id">Seat Class Id</label>
        <input type="text" class="form-control" name="seat_class_id" id="seat_class_id" value="<?php echo htmlspecialchars($res['seat_class_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" id="price" value="<?php echo htmlspecialchars($res['price']); ?>">
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
