
<?php
require_once("models/airlines.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $airline_id = $_POST['airline_id'];
    $airline_name = $_POST['airline_name'];
    $country = $_POST['country'];
    $obj = new Airlines($airline_id, $airline_name, $country);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Airlines</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="airlines" class="btn btn-primary mb-3">Back to Manage</a>

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
      <label for="airline_id">Airline Id</label>
      <input type="text" class="form-control" name="airline_id" id="airline_id">
    </div>
    <div class="form-group mb-3">
      <label for="airline_name">Airline Name</label>
      <input type="text" class="form-control" name="airline_name" id="airline_name">
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
