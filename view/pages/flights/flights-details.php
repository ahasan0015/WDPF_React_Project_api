
<?php
require_once("models/flights.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Flights::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Flights</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="flights" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Flight Id</th>
    <td><?php echo htmlspecialchars($item['flight_id']); ?></td>
  </tr>
  <tr>
    <th>Airline Id</th>
    <td><?php echo htmlspecialchars($item['airline_id']); ?></td>
  </tr>
  <tr>
    <th>Departure Airport Id</th>
    <td><?php echo htmlspecialchars($item['departure_airport_id']); ?></td>
  </tr>
  <tr>
    <th>Arrival Airport Id</th>
    <td><?php echo htmlspecialchars($item['arrival_airport_id']); ?></td>
  </tr>
  <tr>
    <th>Departure Time</th>
    <td><?php echo htmlspecialchars($item['departure_time']); ?></td>
  </tr>
  <tr>
    <th>Arrival Time</th>
    <td><?php echo htmlspecialchars($item['arrival_time']); ?></td>
  </tr>
  <tr>
    <th>Flight Type Id</th>
    <td><?php echo htmlspecialchars($item['flight_type_id']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
