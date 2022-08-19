

//Delete category

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

  $result = $pdo->prepare('DELETE FROM categories WHERE id = :id');
  $result->bindParam(':id', $_GET['id']);
  $result->execute();
  header('location: index.php?v=categories');
 ?>
