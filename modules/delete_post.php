

// Delete post
<?php
if(isset($_POST['nazwa_cat'])){
    $result = $pdo->prepare('UPDATE categories SET name = :name WHERE id = :id');
    $result->bindParam(':name', $_POST['nazwa_cat']);
    $result->bindParam(':id', $_GET['id']);
    $result->execute();

    header('location: index.php?v=posts');
}


if(!isset($_GET['id'])){
  header('location:index.php?v=posts');
}

  $result = $pdo->prepare('SELECT id FROM posts WHERE id = :id');
  $result->bindParam(':id', $_GET['id']);
  $result->execute();
  $post = $result ->fetch();
  if($post){
      $result = $pdo->prepare('DELETE FROM posts WHERE id = :id');
      $result->bindParam(':id', $_GET['id']);
      $result->execute();
      header('location: index.php?v=posts');
  }else{
      header('location: index.php?v=posts');
  }

 ?>
