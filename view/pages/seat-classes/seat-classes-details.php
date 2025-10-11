
<?php
require_once("models/seat-classes.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = SeatClasses::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Seat Classes</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="seat-classes" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Seat Class Id</th>
    <td><?php echo htmlspecialchars($item['seat_class_id']); ?></td>
  </tr>
  <tr>
    <th>Class Name</th>
    <td><?php echo htmlspecialchars($item['class_name']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
