<?php
$name = 'Дима';
$age = 22;
$email = 'dkakharov@yandex.ru';
$city = 'Syktyvkar';
$about = 'Пытаюсь освоить PHP';
?>

<!DOCTYPE html>
<head>
	<title>Обо мне</title>
	<style>
		dl{display: table-row;}
		
		dt, dd{
			display: table-cell;
			padding: 5px 10px;
		}
	</style>
</head>
<body>
	<h1>Страница пользователя <?php echo $name;?></h1>
	<dl>
		<dt>Имя</dt>
		<dd><?php echo $name;?></dd>
	</dl>
	<dl>
		<dt>Возраст</dt>
		<dd><?php echo $age;?></dd>
	</dl>
	<dl>
		<dt>Адрес электронной почты</dt>
		<dd><?php echo $email;?></dd>
	</dl>
	<dl>
		<dt>Город</dt>
		<dd><?php echo $city;?></dd>
	</dl>
	<dl>
		<dt>О себе</dt>
		<dd><?php echo $about;?></dd>
	</dl>
</body>
</html>