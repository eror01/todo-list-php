<?php 

function displayUserAndItemCount() {             
  global $connection;
  $query = "SELECT * FROM users  WHERE NOT user_role = 'admin' ";
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







?>