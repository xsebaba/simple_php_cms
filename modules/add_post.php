<h1> Dodaj nowego posta !</h1>

<?php
if(isset($_POST['title'])){
  $result = $pdo->prepare('INSERT INTO posts (title, body, category_id) VALUES(:title, :body, :category_id)');
  $result->bindParam(':title', $_POST['title']);
  $result->bindParam(':body', $_POST['body']);
  $result->bindParam(':category_id', $_POST['category_id']);
  $result->execute();

  header('location: index.php?v=posts');

}

$result = $pdo->query('SELECT * FROM categories');
$categories = $result->fetchAll();
?>




<form method="post">
  <div class="form-group">
    <label>Tytuł posta</label>
    <input type="text" name="title" class="form-control">
    <label>Wpisz treść </label>
    <textarea class="form-control" name="body" cols="30" rows="10"></textarea>
    <label>Kategoria</label>
    <select class="form-control" name="category_id">
      <?php
        foreach($categories as $category){
          echo '<option value="' . $category['name'] . '">';
          echo $category['name'] . "</option>";
        }
       ?>
    </select>
    <button class="btn btn-secondary"> Zapisz nowego posta </button>
  </div>

</form>
