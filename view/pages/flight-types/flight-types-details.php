
<?php
require_once("models/flight-types.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = FlightTypes::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Flight Types</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="flight-types" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Flight Type Id</th>
    <td><?php echo htmlspecialchars($item['flight_type_id']); ?></td>
  </tr>
  <tr>
    <th>Type Name</th>
    <td><?php echo htmlspecialchars($item['type_name']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
