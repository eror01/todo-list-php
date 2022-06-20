<?php 


function createTodoItem() {
  global $connection;
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    if (isset($_POST['create_todo'])) {
      $todo_content = $_POST['todo-content'];
      $todo_content = stripslashes($todo_content);
      $todo_content = mysqli_real_escape_string($connection, $todo_content);
  
      $query = "INSERT INTO todos(todo_content, todo_user_id) ";
      $query .= "VALUES('{$todo_content}', $user_id) ";
      $create_todo_query = mysqli_query($connection, $query);
    }
  }
}

function showTodoItems() {
  global $connection;
  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM todos WHERE todo_user_id = '{$user_id}' ";
    $todo_user_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($todo_user_query);
    if ($count === 0) {
      echo "<h2 class='text-center'>No todo items!</h2>";
    } else {
      while ($row = mysqli_fetch_assoc($todo_user_query)) {
        $todo_id = $row['todo_id'];
        $todo_content = $row['todo_content'];
        echo "<ul class='todo-list_list'>";
        echo "<li class='todo-list_item'>";
        echo "<p class='todo-list_title'>{$todo_content}</p>";
        echo "<a class='todo-list_link edit' href='index.php?edit={$todo_id}' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit Todo'><i class='fa-solid fa-file-pen'></i></a>";
        echo "<a class='todo-list_link delete' href='index.php?delete={$todo_id}' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete Todo'><i class='fa-solid fa-xmark'></i></a>";
        echo "</li>";
        echo "</ul>";
      }
    }
  } 
}

function updateTodo() {
  global $connection;
  if(isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    if(isset($_POST['update_todo'])) {
      $todo_content_updated = $_POST['todo-content_updated'];
      $query = "UPDATE todos SET ";
      $query .= "todo_content = '{$todo_content_updated}' ";
      $query .= "WHERE todo_id = {$edit_id} ";
      $update_todo = mysqli_query($connection, $query);
      header("Location: index.php");
    }
  }
}

function deleteTodo() {
  global $connection;
  if(isset($_GET['delete'])) { 
    $todo_id = $_GET['delete'];
    $query = "DELETE FROM todos WHERE todo_id = {$todo_id} ";
    $delete_todo = mysqli_query($connection, $query);
    header("Location: index.php");
  }
}

function createUser() {
  global $connection;
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
    } else {
      $user_name = stripslashes($user_name);
      $user_name = mysqli_real_escape_string($connection,$user_name);
      $user_password = stripslashes($user_password);
      $user_password = mysqli_real_escape_string($connection, $user_password);
      
      $query = "INSERT INTO users(user_name, user_password, user_email) ";
      $query .= "VALUES('{$user_name}', '{$user_password}', '{$user_email}' ) ";
      $create_user = mysqli_query($connection, $query);
      header("Location: login.php");
    }
  }
}


?>