
<?php
require_once("models/seat-classes.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seat_class_id = $_POST['seat_class_id'];
    $class_name = $_POST['class_name'];
    $obj = new SeatClasses($seat_class_id, $class_name);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = SeatClasses::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Seat Classes</h1>
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
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if(!empty($res)) { ?>
<div class="card">
  <form method="post">
    <div class="card-body">
      <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
      <div class="form-group mb-3">
        <label for="seat_class_id">Seat Class Id</label>
        <input type="text" class="form-control" name="seat_class_id" id="seat_class_id" value="<?php echo htmlspecialchars($res['seat_class_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="class_name">Class Name</label>
        <input type="text" class="form-control" name="class_name" id="class_name" value="<?php echo htmlspecialchars($res['class_name']); ?>">
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
