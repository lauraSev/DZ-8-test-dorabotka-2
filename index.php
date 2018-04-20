<?php
	include ('login.php');
	$oLogin = new Login();
	
	
	if (isset ($_POST['send'])&& $_POST['login'] != ""){
		$result = $oLogin->avtorizatsiya($_POST['login'], $_POST['pas']);
		if ($result){
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: list.php");
				exit();
		}
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laura test</title>
</head>

<body>
<table>
	<tr>
    	
    	<td valign="top">
        	<h3>Войти как админ:</h3>
        	<form action="index.php" method="post">
                <input type="text" name="login" placeholder="введите логин"><br>
                <input type="password" name="pas" placeholder="введите пароль"><br>
                <input type="submit" name="send" value="Войти"><br>
    		</form>
        </td>
        <td valign="top">
        	<h3>Войти как гость:</h3>
        	<form action="index.php" method="post">
                <input type="text" name="login" placeholder="введите логин"><br>
                <input type="submit" name="send" value="Войти"><br>
    		</form>
        </td>
    </tr>
</table>



</body>
</html>
