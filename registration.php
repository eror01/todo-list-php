<?php 
include "./includes/header.php"; 
include "./includes/functions.php"; ?>
<?php
if (isset($_POST['create_user'])) {
  $user_name = $_POST['username'];
  $user_email = $_POST['email'];
  $user_password = $_POST["password"];
  $user_cpassword = $_POST["confirm_password"];
  
  if (!preg_match("/^[a-zA-z]*$/", $user_name)) {
    $error = '<div class="alert alert-danger" role="alert">
      Only alphabets and whitespace are allowed.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    echo $error;
  }
  if($user_password !== $user_cpassword) {
    $error = '<div class="alert alert-danger" role="alert">
      Passwords do not match! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    echo $error;
  }
  $uppercase = preg_match('@[A-Z]@', $user_password);
  $lowercase = preg_match('@[a-z]@', $user_password);
  $number    = preg_match('@[0-9]@', $user_password);
  $specialChars = preg_match('@[^\w]@', $user_password);
  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($user_password) < 8) {
    $error = '<div class="alert alert-danger" role="alert">
    Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    echo $error;
  }
  $user_name = stripslashes($user_name);
  $user_name = mysqli_real_escape_string($connection,$user_name);
  $user_password = stripslashes($user_password);
  $user_password = mysqli_real_escape_string($connection, $user_password);
  
  $query = "INSERT INTO users(user_name, user_password, user_email) ";
  $query .= "VALUES('{$user_name}', '{$user_password}', '{$user_email}' ) ";
  $create_user = mysqli_query($connection, $query);
  isQueryValid($create_user);
  header("Location: login.php");
}
?>
<div class="wrapper bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-10">
        <h2 class="registration__heading text-center">Registration</h2>
        <hr>
      </div>
      <div class="col-10">
        <form action="" method="POST">
          <div class="form-group mt-2">
            <label for="username" class="mb-1 ">Username</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Username" required>
            <div class="invalid-feedback">Username is required!</div>
          </div>
          <div class="form-group mt-2">
            <label for="email" class="mb-1 ">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
            <div class="invalid-feedback">Email is required!</div>
          </div>
          <div class="form-group mt-2">
            <label for="password" class="mb-1 ">Password</label>
            <input type="password" id="password" class="form-control password" required placeholder="Enter your pasword" name="password">
          </div>
          <div class="form-group mt-2" class="mb-1">
            <label for="confirm_password" class="mb-1 ">Confirm password</label>
            <input type="password" id="confirm_password" class="form-control" required placeholder="Confirm password" name="confirm_password">
          </div>
          <input type="submit" value="Register" name="create_user" class="btn btn-primary w-100 mt-4">
        </form>
      </div>
    </div>
  </div>
</div>
