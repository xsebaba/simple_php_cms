<?php
include('db/pdo.php');

if(array_key_exists('v', $_GET)){
	$module=$_GET['v'];
}
else{
	$module="categories";
}

$pathFile = 'modules/' . $module . '.php';


if(file_exists($pathFile)){
		ob_start();
		include($pathFile);
		$content = ob_get_contents();
		ob_end_clean();
		include("layouts/admin.php");
		}

else{
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		echo '404 file not found';
}




?>
