
<?php
require_once("models/bookings.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Bookings::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Bookings</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="bookings" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Booking Id</th>
    <td><?php echo htmlspecialchars($item['booking_id']); ?></td>
  </tr>
  <tr>
    <th>User Id</th>
    <td><?php echo htmlspecialchars($item['user_id']); ?></td>
  </tr>
  <tr>
    <th>Booking Type Id</th>
    <td><?php echo htmlspecialchars($item['booking_type_id']); ?></td>
  </tr>
  <tr>
    <th>Booking Date</th>
    <td><?php echo htmlspecialchars($item['booking_date']); ?></td>
  </tr>
  <tr>
    <th>Total Price</th>
    <td><?php echo htmlspecialchars($item['total_price']); ?></td>
  </tr>
  <tr>
    <th>Status Id</th>
    <td><?php echo htmlspecialchars($item['status_id']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
