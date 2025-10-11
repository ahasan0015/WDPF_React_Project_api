
<?php
require_once("models/airlines.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $airline_id = $_POST['airline_id'];
    $airline_name = $_POST['airline_name'];
    $country = $_POST['country'];
    $obj = new Airlines($airline_id, $airline_name, $country);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = Airlines::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Airlines</h1>
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
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if(!empty($res)) { ?>
<div class="card">
  <form method="post">
    <div class="card-body">
      <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
      <div class="form-group mb-3">
        <label for="airline_id">Airline Id</label>
        <input type="text" class="form-control" name="airline_id" id="airline_id" value="<?php echo htmlspecialchars($res['airline_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="airline_name">Airline Name</label>
        <input type="text" class="form-control" name="airline_name" id="airline_name" value="<?php echo htmlspecialchars($res['airline_name']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="country">Country</label>
        <input type="text" class="form-control" name="country" id="country" value="<?php echo htmlspecialchars($res['country']); ?>">
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
