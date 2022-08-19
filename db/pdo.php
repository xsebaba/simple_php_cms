<?php
$pdo= new PDO('mysql: host=localhost; dbname=cms01; encoding=utf8',username:'root', password:'');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
 ?>
