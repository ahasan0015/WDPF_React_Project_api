
<?php
require_once("models/users.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Users::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Users</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="users" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>User Id</th>
    <td><?php echo htmlspecialchars($item['user_id']); ?></td>
  </tr>
  <tr>
    <th>Role Id</th>
    <td><?php echo htmlspecialchars($item['role_id']); ?></td>
  </tr>
  <tr>
    <th>Name</th>
    <td><?php echo htmlspecialchars($item['name']); ?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php echo htmlspecialchars($item['email']); ?></td>
  </tr>
  <tr>
    <th>Password</th>
    <td><?php echo htmlspecialchars($item['password']); ?></td>
  </tr>
  <tr>
    <th>Phone</th>
    <td><?php echo htmlspecialchars($item['phone']); ?></td>
  </tr>
  <tr>
    <th>Created At</th>
    <td><?php echo htmlspecialchars($item['created_at']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
