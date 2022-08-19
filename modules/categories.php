<h1> Categories</h1>
<?php
 $result = $pdo->query('SELECT * FROM categories');
 $categories = $result->fetchAll();




?>
<table class="table striped table-hover">
  <tr>
    <td>LP</td>
    <td>Nazwa</td>
    <td>Edytuj</td>
    <td>Usuń</td>
  </tr>
<?php
foreach($categories as $category) {
?>
  <tr>
    <td><?php echo $category['id'];?></td>
    <td><?php echo $category['name'];?></td>
    <td><a href="index.php?v=edit_category&id=<?php echo $category['id'] ?>" class="btn btn-success">Edytuj</a></td>
    <td><a href="index.php?v=delete_category&id=<?php echo $category['id']?>" class="btn btn-danger">Usuń</a></td>
  </tr>
<?php
}
 ?>
</table>



<a href="index.php?v=add_category" class="btn btn-secondary">Dodaj kategorię</a>
