<?php
error_reporting(-1);
ini_set('display_errors', 'On');

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
		header('Location: ./list.php');
	}
	
	echo '<pre>';
	var_dump($_FILES);
	echo '</pre>';
	
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Загрузка теста</title>
	</head>
<body>
	<form enctype="multipart/form-data" action="" method="post">
		<label for="file">Тест</label>
		<input type="file" name="test" id="file">
		<input type="submit" value="Загрузить">
	</form>
</body>
</html>
