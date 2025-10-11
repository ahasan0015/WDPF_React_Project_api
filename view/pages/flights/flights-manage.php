
<?php
require_once("models/flights.class.php");
$msg = "";
if(isset($_POST['delete_id'])) {
  $id = $_POST['delete_id'];
  $msg = Flights::delete($id);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Manage Flights</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="flights-create" class="btn btn-primary mb-3">Add New</a>

<?php if($msg) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg; ?>
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<table class="table table-striped">
  <thead>
  <tr>
    <th>Flight Id</th>
    <th>Airline Id</th>
    <th>Departure Airport Id</th>
    <th>Arrival Airport Id</th>
    <th>Departure Time</th>
    <th>Arrival Time</th>
    <th>Flight Type Id</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  <?php
    $items = Flights::readAll();
    foreach($items as $item){
      echo "<tr>";
      echo "<td>".$item['flight_id']."</td>";
      echo "<td>".$item['airline_id']."</td>";
      echo "<td>".$item['departure_airport_id']."</td>";
      echo "<td>".$item['arrival_airport_id']."</td>";
      echo "<td>".$item['departure_time']."</td>";
      echo "<td>".$item['arrival_time']."</td>";
      echo "<td>".$item['flight_type_id']."</td>";
  ?>
    <td>
      <form action="flights-details" method="get">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="submit" class="btn btn-info" value="Details">
      </form>
      <form action="flights-edit" method="get">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="submit" class="btn btn-primary" value="Edit">
      </form>
      <form method="post">
        <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
        <input type="submit" class="btn btn-danger" value="Delete">
      </form>
    </td>
  <?php
      echo "</tr>";
    }
  ?>
  </tbody>
</table>

    </div>
  </section>
</div>
