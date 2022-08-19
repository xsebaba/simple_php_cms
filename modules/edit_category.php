

<h1> Edytuj wybraną kategorię</h1>
<?php
if(isset($_POST['nazwa_cat'])){
    $result = $pdo->prepare('UPDATE categories SET name = :name WHERE id = :id');
    $result->bindParam(':name', $_POST['nazwa_cat']);
    $result->bindParam(':id', $_GET['id']);
    $result->execute();

    header('location: index.php?v=categories');
}


if(!isset($_GET['id'])){
  header('location:index.php?v=categories');
}

  $result = $pdo->prepare('SELECT * FROM categories WHERE id = :id');
  $result->bindParam(':id', $_GET['id']);
  $result->execute();
  $category = $result->fetch();
  if($category===false){
  header('location: index.php?v=categories');
  }


 ?>

<form method="post">
  <div class="form-group">
    <label>Edytuj nazwę kategorii <?php echo $category['name'];?></label>
    <input type="text" name="nazwa_cat"value=<?php echo $category['name']; ?> class="form-control">
    <button class="btn btn-secondary"> Zmień nazwę kategorii kategorię </button>
  </div>

</form>
