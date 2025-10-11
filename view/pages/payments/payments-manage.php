
<?php
require_once("models/payments.class.php");
$msg = "";
if(isset($_POST['delete_id'])) {
  $id = $_POST['delete_id'];
  $msg = Payments::delete($id);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Manage Payments</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="payments-create" class="btn btn-primary mb-3">Add New</a>

<?php if($msg) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg; ?>
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<table class="table table-striped">
  <thead>
  <tr>
    <th>Payment Id</th>
    <th>Booking Id</th>
    <th>Amount</th>
    <th>Payment Date</th>
    <th>Payment Method Id</th>
    <th>Payment Status Id</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  <?php
    $items = Payments::readAll();
    foreach($items as $item){
      echo "<tr>";
      echo "<td>".$item['payment_id']."</td>";
      echo "<td>".$item['booking_id']."</td>";
      echo "<td>".$item['amount']."</td>";
      echo "<td>".$item['payment_date']."</td>";
      echo "<td>".$item['payment_method_id']."</td>";
      echo "<td>".$item['payment_status_id']."</td>";
  ?>
    <td>
      <form action="payments-details" method="get">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="submit" class="btn btn-info" value="Details">
      </form>
      <form action="payments-edit" method="get">
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
