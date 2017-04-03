<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'functions.php';

$sessionCount = 0;

if (!empty($_SESSION['guest'])){
	$sessionCount = 1;
}

if (!empty($_SESSION['user'])){
	$sessionCount = 1;
}

if($sessionCount == 0){
	header('Location: index.php');
	die();
}

if(!empty(getLoggedUser()['name'])){
	$name = getLoggedUser()['name'];
}

if(!empty($_SESSION['guest'])){
	$name = $_SESSION['guest'];
}

if(isset($_GET['test'])){
	$getParametr = true;
	if (file_exists('test/'. $_GET['test'])){
		$file = file_get_contents('test/' . $_GET['test'], true);
	}
	else{
		header("HTTP/1.0 404 Not Found");
		die();
	}
	$decode = json_decode($file, true);
	
	$primer = $decode["calculate"]["description"];
	$answer = $decode["calculate"]["result"];
	$type = $decode["calculate"]["input"]["type"];
	
	$fp = fopen('answer.txt', 'w');
	
	$test = fwrite($fp, $answer);
	
	fclose($fp);
}

else{
	$getParametr = false;
}

if(isset($_GET['sum'])){
	$file = file_get_contents('answer.txt', true);
	
	
	if($_GET['sum'] == $file){
		require_once 'certificate.php';
	}
	else{
		echo 'Ответ не правильный.';
		die();
	}
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Генератор тестов</title>
		<link rel="stylesheet" href="style/style.css">
	</head>
<body>
<div class="main">
	<h2>Решите пример</h2>
	<form action="" method="get">
		<label for="sum">
		
		<?php if($getParametr) {
				echo $decode["calculate"]["description"];
			} 
			else die();
		?>
		</label>
		
		<input type="<?php echo $type?>" name="sum" id="sum">
		<input type="submit" value="Проверить">
	</form>
</div>	
</body>
</html>
