
<?php
require_once("models/booking-flights.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = null; // Assuming auto-increment
    $booking_id = $_POST['booking_id'];
    $flight_id = $_POST['flight_id'];
    $seat_class_id = $_POST['seat_class_id'];
    $price = $_POST['price'];
    $obj = new BookingFlights(null, $booking_id, $flight_id, $seat_class_id, $price);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Booking Flights</h1>
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
      <label for="flight_id">Flight Id</label>
      <input type="text" class="form-control" name="flight_id" id="flight_id">
    </div>
    <div class="form-group mb-3">
      <label for="seat_class_id">Seat Class Id</label>
      <input type="text" class="form-control" name="seat_class_id" id="seat_class_id">
    </div>
    <div class="form-group mb-3">
      <label for="price">Price</label>
      <input type="text" class="form-control" name="price" id="price">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
