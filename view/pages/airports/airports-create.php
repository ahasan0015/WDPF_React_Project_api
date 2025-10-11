
<?php
require_once("models/airports.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $airport_id = $_POST['airport_id'];
    $airport_name = $_POST['airport_name'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $obj = new Airports($airport_id, $airport_name, $city, $country);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Airports</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="airports" class="btn btn-primary mb-3">Back to Manage</a>

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
      <label for="airport_id">Airport Id</label>
      <input type="text" class="form-control" name="airport_id" id="airport_id">
    </div>
    <div class="form-group mb-3">
      <label for="airport_name">Airport Name</label>
      <input type="text" class="form-control" name="airport_name" id="airport_name">
    </div>
    <div class="form-group mb-3">
      <label for="city">City</label>
      <input type="text" class="form-control" name="city" id="city">
    </div>
    <div class="form-group mb-3">
      <label for="country">Country</label>
      <input type="text" class="form-control" name="country" id="country">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
