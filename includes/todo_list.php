<?php  
$username = $_SESSION['username']; 
$user_id = $_SESSION['user_id'];
if(isset($_POST['create_todo'])) {
  $todo_content = $_POST['todo-content'];
  $todo_content = stripslashes($todo_content);
  $todo_content = mysqli_real_escape_string($connection, $todo_content);

  $query = "INSERT INTO todos(todo_content, todo_user_id) ";
  $query .= "VALUES('{$todo_content}', $user_id) ";
  $create_todo_query = mysqli_query($connection, $query);
}
?>
<section class="todo-list" id="todo">
  <div class="row  justify-content-center">
    <div class="col-12">
      <h1 class="todo-list_user">
        <?php echo ucfirst($username) . "'s" . " Todo List"?>
      </h1>
    </div>
    <div class="col-10">
      <form action="" method="POST">
        <div class="input-group">
          <input type="text" class="form-control todo-input" name="todo-content" id="todo-content" placeholder="Create your todo item" required>
          <span class="input-group-btn">
            <button class="btn btn-dark" name="create_todo" type="submit">Add Todo</button>
          </span>
        </div>
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">
      <ul class="todo-list_list">
        <li class="todo-list_item">
          <p class="todo-list_title">Post name pera pak</p>
          <a class="todo-list_link edit" href="index.php?t=todo_id" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Todo"><i class="fa-solid fa-file-pen"></i></a>
          <a class="todo-list_link delete" href="index.php?d=todo_id" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Todo"><i class="fa-solid fa-xmark"></i></a>
        </li>
        <li class="todo-list_item">
          <p class="todo-list_title">Post name pera pak</p>
          <a class="todo-list_link edit" href="index.php?t=todo_id" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Todo"><i class="fa-solid fa-file-pen"></i></a>
          <a class="todo-list_link delete" href="index.php?d=todo_id" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Todo"><i class="fa-solid fa-xmark"></i></a>
        </li>
        <li class="todo-list_item">
          <p class="todo-list_title">Post name pera pak</p>
          <a class="todo-list_link edit" href="index.php?t=todo_id" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Todo"><i class="fa-solid fa-file-pen"></i></a>
          <a class="todo-list_link delete" href="index.php?d=todo_id" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Todo"><i class="fa-solid fa-xmark"></i></a>
        </li>
      </ul>
    </div>
  </div>
</section>