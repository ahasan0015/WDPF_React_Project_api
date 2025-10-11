
<?php
require_once("models/flight-types.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flight_type_id = $_POST['flight_type_id'];
    $type_name = $_POST['type_name'];
    $obj = new FlightTypes($flight_type_id, $type_name);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Flight Types</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="flight-types" class="btn btn-primary mb-3">Back to Manage</a>

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
      <label for="flight_type_id">Flight Type Id</label>
      <input type="text" class="form-control" name="flight_type_id" id="flight_type_id">
    </div>
    <div class="form-group mb-3">
      <label for="type_name">Type Name</label>
      <input type="text" class="form-control" name="type_name" id="type_name">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
