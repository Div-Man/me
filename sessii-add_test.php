<?php
require_once 'functions.php';

if (isLoggedGuest() || isLogged()){
	if($_FILES){
		if(isset($_FILES)){
			$testName = $_FILES['test']['name'];
		}
		else{
			$testName = '';
		}
		if(empty($testName)){
			echo 'Згрузите тест';
		}
		
		echo $testName;
		
		$testTmpFileName = isset($_FILES['test']['tmp_name']) ? $_FILES['test']['tmp_name'] : '';
		
		if($testTmpFileName){
			$testFileName = './test/'. $testName;//путь теста
			$successMoved = move_uploaded_file($testTmpFileName, $testFileName); //перемещаю файл
			header('Location: ./add_test.php');
		}
	}
	
	$files = scandir(__DIR__ . '/' . 'test');
	$title = 'Список загруженных тестов';
}

else{
	http_response_code(403);
	die;
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Загрузка теста</title>
		<link rel="stylesheet" href="style/style.css">
	</head>
<body>
<div class="main">
<?php
	if(isLogged()){
		echo '<p>Добро пожаловать, ' . getLoggedUser()['name'] . ' '.'<a href="logout.php">Выход</a></p>';
	}
	else{
		echo '<p>Добро пожаловать, ' . $_SESSION['guest']. ' <a href="logout.php">Выход</a></p>';
	}
?>
	<?php if(isLogged()):?>
	<form enctype="multipart/form-data" action="" method="post">
		<label for="file">Тест</label>
		<input type="file" name="test" id="file">
		<input type="submit" value="Загрузить">
	</form>
	<?php endif;?>
	
	<h2><?php echo $title?></h2>

<ol>
<?php

	foreach ($files as $f) {
            if(pathinfo($f, PATHINFO_EXTENSION) == 'json'){
                echo '<li>';
						if(isLogged()){
							echo $f . ' <a href="./test.php?test=' . $f .'">Открыть</a> <a href="?del=' .  $f .'">Удалить</a></li>';
						}
						else{
							echo $f . ' <a href="./test.php?test=' . $f .'">Открыть</a></li>';
						}
            } 
        };
		
		if(isset($_GET['del'])){
			unlink('./test/' . $_GET['del']);
			header('Location: ./add_test.php');
		}
	?>
</ol>
</div>
</body>
</html>
