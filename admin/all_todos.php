<?php
include "includes/admin_header.php";
include "includes/admin_nav.php";
include "functions.php"; ?>

<div class="admin-todos">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center admin-todos-title">Overview of all todos</h1>
      </div>
      <div class="col-12">
        <?php
        $per_page = 5;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = "";
        }
        if ($page == "" || $page == 1) {
          $page_1 = 0;
        } else {
          $page_1 = ($page * $per_page) - $per_page;
        }

        $select_todos_query = "SELECT * FROM todos";
        $count_todos_query = mysqli_query($connection, $select_todos_query);
        $count = mysqli_num_rows($count_todos_query);
        $count = ceil($count / $per_page);

        $query = "SELECT * FROM todos LIMIT $page_1, $per_page";
        $todos_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($todos_query)) {
          $todo_id = $row['todo_id'];
          $todo_content = $row['todo_content'];
          $todo_user_id = $row['todo_user_id'];
          $todo_is_completed = $row['todo_is_completed'];
          $todo_author = $row['todo_author'];
          $todo_content = ucfirst($todo_content);
          $todo_author = ucfirst($todo_author);
          echo "<ul class='todo-list_list'>";
          if ($todo_is_completed == true) {
            echo "<li class='todo-list_item' style='background-color: #DCDCDC;'>";
            echo "<p class='todo-list_title text-decoration-line-through'>{$todo_content} <br><span>Author: {$todo_author}</span></p>";
          } else {
            echo "<li class='todo-list_item'>";
            echo "<p class='todo-list_title'>{$todo_content}<br><span class='text-info'>Author: {$todo_author}</span></p>";
          }
          echo "</li>";
          echo "</ul>";
        }
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <nav aria-label="..." class="admin-pagination">
          <ul class="pagination pagination-lg justify-content-center">
            <?php
            for ($i = 1; $i <= $count; $i++) {
              if ($i == $page || $i == 1 && $page == "") {
                echo "<li class='page-item active'><a class='page-link' href='all_todos.php?page={$i}'>{$i}</a></li>";
              } else {
                echo "<li class='page-item'><a class='page-link' href='all_todos.php?page={$i}'>{$i}</a></li>";
              }
            }
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<?php
include "includes/admin_footer.php"; ?>