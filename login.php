<?php 
include "./includes/header.php"; ?>
<?php 

if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE user_name = '{$username}' ";
  $user_query = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($user_query)) {
    $db_id = $row['user_id'];
    $db_username = $row['user_name'];
    $db_password = $row['user_password'];
  }

  if($username === $db_username && $password === $db_password) {
    $_SESSION['username'] = $db_username;
    $_SESSION['password'] = $db_password;
    $_SESSION['user_id'] = $db_id;
    $_SESSION['loggedIn'] = true;
    header("Location: index.php");
  } else {
    echo "nothing";
  }
}

?>
<div class="wrapper bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-10">
        <h2 class="registration__heading text-center">Login</h2>
        <hr>
      </div>
      <div class="col-10">
        <form action="" method="POST">
          <div class="form-group mt-2">
            <label for="username" class="mb-1 ">Username</label>
            <input type="text" id="username" class="form-control" name="username" required>
            <div class="invalid-feedback">Username is required!</div>
          </div>
          <div class="form-group mt-2">
            <label for="password" class="mb-1 ">Password</label>
            <input type="password" id="password" class="form-control" name="password" required>
            <div class="invalid-feedback">Password is required!</div>
          </div>
          <div class="form-group text-end mt-4">
            <input type="submit" value="Log In" name="login" class="btn btn-dark w-25">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>