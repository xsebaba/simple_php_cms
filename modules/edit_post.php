<h1> Edytuj wpis</h1>

<?php
if(isset($_POST['title'])){
  $result = $pdo->prepare('UPDATE posts SET title= :title, body= :body, category_id = :category_id WHERE id = :id');
  $result->bindParam(':title', $_POST['title']);
  $result->bindParam(':body', $_POST['body']);
  $result->bindParam(':category_id', $_POST['category_id']);
  $result->bindParam(':id', $_GET['id']);
  $result->execute();
  header('location: index.php?v=posts');
  }

if(!isset($_GET['id'])){
  header('location: index.php?v=posts');
  }

$result = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$result->bindParam(':id', $_GET['id']);
$result->execute();
$post = $result->fetch();

$result = $pdo->query('SELECT * FROM categories');
$categories = $result->fetchAll();
?>




<form method="post">
  <div class="form-group">
    <label>Tytuł posta</label>
    <input type="text" name="title" value="<?php echo $post['title'] ?>" class="form-control">
    <label>Wpisz treść </label>
    <textarea class="form-control" name="body" cols="30" rows="10">
<?php echo $post['body'] ?></textarea>
    <label>Kategoria</label>
    <select class="form-control" name="category_id">
      <?php
        foreach($categories as $category){
              if($post['category_id']===$category['id']){
              echo '<option selected value="';
              echo $category['id'] . '">';
            }else{
              echo '<option value="';
              echo $category['id'] . '">';
            }
              echo $category['name'];
              echo '</option>';
        }
       ?>
    </select>
    <button class="btn btn-secondary"> Edytuj wpis </button>
  </div>

</form>
