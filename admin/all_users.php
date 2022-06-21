<?php
include "includes/admin_header.php";
include "includes/admin_nav.php"; ?>

<section class="users">
  <div class="container">
    <div class="row">
      <div class="col-4">
        <div class="accordion" id="accordion">
          <?php
          $query = "SELECT * FROM users WHERE NOT user_role = 'admin' ";
          $select_all_users = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($select_all_users)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_email = $row['user_email'];
            $user_todo_count = $row['user_list_count'];
            $user_role = $row['user_role'];
            $user_role = ucfirst($user_role);
            $user_name = ucfirst($user_name);
          ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading-<?php echo $user_id; ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $user_id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $user_id; ?>">
                  <?php echo $user_name; ?>
                </button>
              </h2>
              <div id="collapse-<?php echo $user_id; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $user_id; ?>" data-bs-parent="#accordion">
                <div class="accordion-body">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">User ID: <span><?php echo $user_id; ?></span></li>
                    <li class="list-group-item d-flex justify-content-between">User Email: <span><?php echo $user_email; ?></span></li>
                    <li class="list-group-item d-flex justify-content-between">User Role: <span><?php echo $user_role ?></span></li>
                    <li class="list-group-item d-flex justify-content-between">User Todo Item Count: <span class="badge bg-primary rounded-pill"><?php echo $user_todo_count; ?></span></li>
                    <li class="list-group-item d-flex justify-content-between">
                      <a href="" class="btn btn-outline-dark">Edit User</a>
                      <a href="" class="btn btn-outline-dark">User Todo's</a>
                      <a href="" class="btn btn-outline-dark">Delete User</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-8">
        <form action="" method="POST">
          <div class="form-group">
            <input type="text" name="" id="">
            <input type="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include "includes/admin_footer.php"; ?>