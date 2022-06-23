<?php 

function confirmQuery($result) {
  global $connection;
  if(!$result) {
    die("QUERY FAILED" . mysqli_error($connection));
  }
}

function displayFourUserAndItemCount() {             
  global $connection;
  $query = "SELECT * FROM users ";
  $query .= "WHERE NOT user_role = 'admin' ";
  $query .= "ORDER BY user_list_COUNT DESC LIMIT 4 ";
  $select_users = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_list_count = $row['user_list_count'];
    $user_role = $row['user_role'];
    $user_name = ucfirst($user_name);
    echo "<li class='list-group-item d-flex justify-content-between'><span>{$user_name}</span> <span class='text-info'>Todo Item Count: {$user_list_count}</span></li>";
  }
}

function showFourTodoItems() {
  global $connection;
  $query = "SELECT * FROM todos LIMIT 4 ";
  $select_todos = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_todos)) {
    $todo_id = $row['todo_id'];
    $todo_content = $row['todo_content'];
    $todo_user_id = $row['todo_user_id']; 
    $todo_content = ucfirst($todo_content);
    echo "<li class='list-group-item'>{$todo_content}</li>";
  }
}

function updateUsernameAndRole() {
  global $connection;
  if(isset($_GET['edit_user'])) {
    $edit_id = $_GET['edit_user'];
    $edit_id = mysqli_real_escape_string($connection, $edit_id);
    if(is_numeric(($edit_id))) {
      if(isset($_POST['update_user'])) {
        $updated_username = $_POST['update_username'];
        $updated_username = stripslashes($updated_username);
        $updated_username = mysqli_real_escape_string($connection, $updated_username);
        $updated_role = $_POST['update_role'];
    
        $query = "UPDATE users SET ";
        $query .= "user_name = '{$updated_username}', ";
        $query .= "user_role = '{$updated_role}' ";
        $query .= "WHERE user_id = {$edit_id} ";
        $update_user_query = mysqli_query($connection, $query);
        header("Location: all_users.php");
      }
    }
  } 
}
