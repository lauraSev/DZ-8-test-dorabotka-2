<?php
	include ('login.php');
	$oLogin = new Login();
?>	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Список тестов</title>
</head>
<body>
<?php
	if ($oLogin->isAdmin()){
		echo '<div align="right">'.$oLogin->getUserName() . '(' . $oLogin->getUserRole().')' . '</div><a href="admin.php">Загрузить тест</a>';
	}
	else{
		echo '<div align="right">'.$oLogin->getUserName() . '(' . $oLogin->getUserRole().')' . '</div>';	
	}
?>
<hr>
<?php
	$papka = __DIR__  .  DIRECTORY_SEPARATOR . "tests"  .  DIRECTORY_SEPARATOR ;
	$files = scandir($papka);
	foreach ($files as $file) {
		if (is_file ($papka . $file)) {
			$soderjimoe = file_get_contents( $papka . $file);
			$soderjimoe = json_decode ( $soderjimoe, true);
			echo '<a href="test.php?test_file_name=' .$file . '">' .  $soderjimoe ["title"] . '</a>';
			if ($oLogin->isAdmin())
			echo '&nbsp;&nbsp;&nbsp;<a style="color:red;" href="admin.php?test_file_name=' .$file . '&delete=Y">x</a>';
			echo '<br><br>';
		}
	}
?>
</body>
</html>

 