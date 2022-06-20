<?php
include "functions.php";
createTodoItem(); 
updateTodo(); 
if(isset($_SESSION['user_id'])) {
  $query = "SELECT count(todo_user_id) as total FROM todos WHERE todo_user_id = {$_SESSION['user_id']} ";
  $count_query = mysqli_query($connection, $query);
  $data = mysqli_fetch_assoc($count_query);
  $counter = $data['total'];
}
$query = "UPDATE users SET user_list_count = {$counter} ";
$query .= "WHERE user_id = {$_SESSION['user_id']} ";
$user_list_update = mysqli_query($connection, $query); ?>
<section class="todo-list" id="todo">
  <div class="row  justify-content-center">
    <div class="col-12">
      <h1 class="todo-list_user">
        <?php
        if ($username) {
          echo ucfirst($username) . "'s" . " Todo List";
        } ?>
      <p>Todo Item Count: <span class="badge bg-primary"><?php echo $counter; ?></span></p>
      </h1>
    </div>
    <div class="col-10">
      <?php if(isset($_GET['edit'])) : 
      $todo_edit_id = $_GET['edit'];
      $query = "SELECT * FROM todos WHERE todo_id = {$todo_edit_id} ";
      $select_todo_query = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_todo_query)) {
        $todo_content = $row['todo_content'];
      } ?>
        <form action="" method="POST">
          <div class="input-group">
            <input type="text" class="form-control todo-input" value="<?php echo $todo_content; ?>" name="todo-content_updated" id="todo-content" placeholder="Update your todo" required>
            <span class="input-group-btn">
              <button class="btn btn-dark" name="update_todo" type="submit">Update Todo</button>
            </span>
          </div>
        </form>
        <?php else : ?>
          <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control todo-input" name="todo-content" id="todo-content" placeholder="Create your todo item" required>
              <span class="input-group-btn">
                <button class="btn btn-dark" name="create_todo" type="submit">Add Todo</button>
              </span>
            </div>
          </form>
      <?php endif; ?>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">
      <?php
      showTodoItems();
      deleteTodo(); ?>
    </div>
  </div>
</section>