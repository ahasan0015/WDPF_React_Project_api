
<?php
require_once("models/users.class.php");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $role_id = $_POST['role_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $created_at = $_POST['created_at'];
    $obj = new Users($user_id, $role_id, $name, $email, $password, $phone, $created_at);
    $msg = $obj->create();
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Create Users</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="users" class="btn btn-primary mb-3">Back to Manage</a>

<?php if($msg) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg; ?>
  <button type="button" class="btn-close close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<form method="post">
  <input type="hidden" name="id">
  <div class="card-body">
    <div class="form-group mb-3">
      <label for="user_id">User Id</label>
      <input type="text" class="form-control" name="user_id" id="user_id">
    </div>
    <div class="form-group mb-3">
      <label for="role_id">Role Id</label>
      <input type="text" class="form-control" name="role_id" id="role_id">
    </div>
    <div class="form-group mb-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group mb-3">
      <label for="email">Email</label>
      <input type="text" class="form-control" name="email" id="email">
    </div>
    <div class="form-group mb-3">
      <label for="password">Password</label>
      <input type="text" class="form-control" name="password" id="password">
    </div>
    <div class="form-group mb-3">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" name="phone" id="phone">
    </div>
    <div class="form-group mb-3">
      <label for="created_at">Created At</label>
      <input type="text" class="form-control" name="created_at" id="created_at">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
</form>

    </div>
  </section>
</div>
