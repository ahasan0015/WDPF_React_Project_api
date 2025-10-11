
<?php
require_once("models/seat-classes.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seat_class_id = $_POST['seat_class_id'];
    $class_name = $_POST['class_name'];
    $obj = new SeatClasses($seat_class_id, $class_name);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Seat Classes</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="seat-classes" class="btn btn-primary mb-3">Back to Manage</a>

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
      <label for="seat_class_id">Seat Class Id</label>
      <input type="text" class="form-control" name="seat_class_id" id="seat_class_id">
    </div>
    <div class="form-group mb-3">
      <label for="class_name">Class Name</label>
      <input type="text" class="form-control" name="class_name" id="class_name">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
