
<?php
require_once("models/passengers.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $passenger_id = $_POST['passenger_id'];
    $booking_id = $_POST['booking_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $passport_number = $_POST['passport_number'];
    $nationality = $_POST['nationality'];
    $obj = new Passengers($passenger_id, $booking_id, $name, $age, $passport_number, $nationality);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Passengers</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="passengers" class="btn btn-primary mb-3">Back to Manage</a>

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
      <label for="passenger_id">Passenger Id</label>
      <input type="text" class="form-control" name="passenger_id" id="passenger_id">
    </div>
    <div class="form-group mb-3">
      <label for="booking_id">Booking Id</label>
      <input type="text" class="form-control" name="booking_id" id="booking_id">
    </div>
    <div class="form-group mb-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group mb-3">
      <label for="age">Age</label>
      <input type="text" class="form-control" name="age" id="age">
    </div>
    <div class="form-group mb-3">
      <label for="passport_number">Passport Number</label>
      <input type="text" class="form-control" name="passport_number" id="passport_number">
    </div>
    <div class="form-group mb-3">
      <label for="nationality">Nationality</label>
      <input type="text" class="form-control" name="nationality" id="nationality">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
