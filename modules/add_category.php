
<?php
if(isset($_POST['nazwa_cat'])){
$result = $pdo->prepare('INSERT INTO categories (name) VALUES(:name)');
$result->bindParam(':name', $_POST['nazwa_cat']);
$result->execute();
?>
<h1> Kategorie</h1>

<?php echo '<h6>Dodano nową kategorię</h6>
<a href="index.php?v=categories" class="btn btn-secondary"> Wróć do kategorii</a>';
}
 ?>

<form method="post">
  <div class="form-group">
    <label>Wpisz nazwę nowej kategorii</label>
    <input type="text" name="nazwa_cat" class="form-control">
    <button class="btn btn-secondary"> Zapisz nową kategorię </button>
  </div>

</form>
