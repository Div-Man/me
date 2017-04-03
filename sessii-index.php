<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'functions.php';

$errors = [];

if(!empty($_SESSION['user'])){
	header('Location: ./add_test.php');
	die();
}


if(isPost()){
	if(login(getParamPost('login'), getParamPost('password'))){
		header('Location: ./add_test.php');
		die();
	}
	
	if(empty($_POST['login'] && $_POST['guest'] && $_POST['password']) ){
		header('Location: ./index.php');
	}
	
	
	if(getCheckbox()){
		$_SESSION['guest'] = $_POST['login'];
		header('Location: ./add_test.php');
		die();
	}
	
	else{
		$errors[] = 'Неверный логин или пароль';
	}
}

foreach($errors as $error){
	echo $error;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Вход на сайт</title>
		<link rel="stylesheet" href="style/style.css">
	</head>
<body>
<div class="main">
<h3>Авторизируйтесь или войдите, как гость</h3>
	<form method="POST">
	<!--
	<div>
		<label for="login">Логин<label>
		<input type="text" name="login" id="login">
		<label for="guest">Войти как гость</label>
		<input type="checkbox" name="guest" id="guest">
	</div>
	<div>
		<label for="password">Пароль<label>
		<input type="password" name="password" id="password">
	</div>	
	-->
	
	<div class="forma">
		<label for="login">Логин<label><br>
		<label for="password">Пароль<label>
	</div>
	
	<div class="forma">
		<input type="text" name="login" id="login"><br>
		<input type="password" name="password" id="password">
	</div>
	
	<div class="forma">
		<label for="guest">Войти как гость</label>
		<input type="checkbox" name="guest" id="guest">
	</div>
	<button class="btn" type="submit">Войти</button>
</form>
</div>
</body>
</html>
