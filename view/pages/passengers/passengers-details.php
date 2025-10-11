
<?php
require_once("models/passengers.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Passengers::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Passengers</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="passengers" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Passenger Id</th>
    <td><?php echo htmlspecialchars($item['passenger_id']); ?></td>
  </tr>
  <tr>
    <th>Booking Id</th>
    <td><?php echo htmlspecialchars($item['booking_id']); ?></td>
  </tr>
  <tr>
    <th>Name</th>
    <td><?php echo htmlspecialchars($item['name']); ?></td>
  </tr>
  <tr>
    <th>Age</th>
    <td><?php echo htmlspecialchars($item['age']); ?></td>
  </tr>
  <tr>
    <th>Passport Number</th>
    <td><?php echo htmlspecialchars($item['passport_number']); ?></td>
  </tr>
  <tr>
    <th>Nationality</th>
    <td><?php echo htmlspecialchars($item['nationality']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
