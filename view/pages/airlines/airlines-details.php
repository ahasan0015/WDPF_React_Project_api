
<?php
require_once("models/airlines.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Airlines::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Airlines</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="airlines" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Airline Id</th>
    <td><?php echo htmlspecialchars($item['airline_id']); ?></td>
  </tr>
  <tr>
    <th>Airline Name</th>
    <td><?php echo htmlspecialchars($item['airline_name']); ?></td>
  </tr>
  <tr>
    <th>Country</th>
    <td><?php echo htmlspecialchars($item['country']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
