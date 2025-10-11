
<?php
require_once("models/booking-flights.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = BookingFlights::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Booking Flights</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="booking-flights" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Id</th>
    <td><?php echo htmlspecialchars($item['id']); ?></td>
  </tr>
  <tr>
    <th>Booking Id</th>
    <td><?php echo htmlspecialchars($item['booking_id']); ?></td>
  </tr>
  <tr>
    <th>Flight Id</th>
    <td><?php echo htmlspecialchars($item['flight_id']); ?></td>
  </tr>
  <tr>
    <th>Seat Class Id</th>
    <td><?php echo htmlspecialchars($item['seat_class_id']); ?></td>
  </tr>
  <tr>
    <th>Price</th>
    <td><?php echo htmlspecialchars($item['price']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
