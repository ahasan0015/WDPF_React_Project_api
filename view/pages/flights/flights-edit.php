
<?php
require_once("models/flights.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flight_id = $_POST['flight_id'];
    $airline_id = $_POST['airline_id'];
    $departure_airport_id = $_POST['departure_airport_id'];
    $arrival_airport_id = $_POST['arrival_airport_id'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $flight_type_id = $_POST['flight_type_id'];
    $obj = new Flights($flight_id, $airline_id, $departure_airport_id, $arrival_airport_id, $departure_time, $arrival_time, $flight_type_id);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = Flights::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Flights</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="flights" class="btn btn-primary mb-3">Back to Manage</a>

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
        <label for="flight_id">Flight Id</label>
        <input type="text" class="form-control" name="flight_id" id="flight_id" value="<?php echo htmlspecialchars($res['flight_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="airline_id">Airline Id</label>
        <input type="text" class="form-control" name="airline_id" id="airline_id" value="<?php echo htmlspecialchars($res['airline_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="departure_airport_id">Departure Airport Id</label>
        <input type="text" class="form-control" name="departure_airport_id" id="departure_airport_id" value="<?php echo htmlspecialchars($res['departure_airport_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="arrival_airport_id">Arrival Airport Id</label>
        <input type="text" class="form-control" name="arrival_airport_id" id="arrival_airport_id" value="<?php echo htmlspecialchars($res['arrival_airport_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="departure_time">Departure Time</label>
        <input type="text" class="form-control" name="departure_time" id="departure_time" value="<?php echo htmlspecialchars($res['departure_time']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="arrival_time">Arrival Time</label>
        <input type="text" class="form-control" name="arrival_time" id="arrival_time" value="<?php echo htmlspecialchars($res['arrival_time']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="flight_type_id">Flight Type Id</label>
        <input type="text" class="form-control" name="flight_type_id" id="flight_type_id" value="<?php echo htmlspecialchars($res['flight_type_id']); ?>">
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
