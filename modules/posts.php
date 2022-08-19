<h1>Posty</h1>

<?php

$result = $pdo->query('SELECT posts.id, posts.title, categories.name FROM posts LEFT JOIN categories ON posts.category_id = categories.id');
$posts = $result->fetchAll();




?>

<table class="table striped table-hover">
  <tr>
    <td>LP</td>
    <td>Tytuł</td>
    <td>Kategoria</td>
    <td>Edytuj</td>
    <td>Usuń</td>
  </tr>
<?php
foreach($posts as $post) {
?>
  <tr>
    <td><?php echo $post['id'];?></td>
    <td><?php echo $post['title'];?></td>
    <td><?php echo $post['name'];?></td>
    <td><a href="index.php?v=edit_post&id=<?php echo $post['id'] ?>" class="btn btn-success">Edytuj</a></td>
    <td><a href="index.php?v=delete_post&id=<?php echo $post['id']?>" class="btn btn-danger">Usuń</a></td>
  </tr>
  <script>
  document.getElementByClass("btn-danger").onclick = function(){
    let con = confirm("Czy na pewno chcesz usunąć wpis?");
    return con;
  }
  </script>
<?php
}
 ?>
</table>



<a href="index.php?v=add_post" class="btn btn-secondary">Dodaj posta</a>
