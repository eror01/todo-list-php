<?php 
include "./includes/header.php"; 
include "./includes/functions.php"; 
createUser(); ?>
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
