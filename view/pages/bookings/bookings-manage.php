
<?php
require_once("models/bookings.class.php");
$msg = "";
if(isset($_POST['delete_id'])) {
  $id = $_POST['delete_id'];
  $msg = Bookings::delete($id);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Manage Bookings</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="bookings-create" class="btn btn-primary mb-3">Add New</a>

<?php if($msg) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg; ?>
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<table class="table table-striped">
  <thead>
  <tr>
    <th>Booking Id</th>
    <th>User Id</th>
    <th>Booking Type Id</th>
    <th>Booking Date</th>
    <th>Total Price</th>
    <th>Status Id</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  <?php
    $items = Bookings::readAll();
    foreach($items as $item){
      echo "<tr>";
      echo "<td>".$item['booking_id']."</td>";
      echo "<td>".$item['user_id']."</td>";
      echo "<td>".$item['booking_type_id']."</td>";
      echo "<td>".$item['booking_date']."</td>";
      echo "<td>".$item['total_price']."</td>";
      echo "<td>".$item['status_id']."</td>";
  ?>
    <td>
      <form action="bookings-details" method="get">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="submit" class="btn btn-info" value="Details">
      </form>
      <form action="bookings-edit" method="get">
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
