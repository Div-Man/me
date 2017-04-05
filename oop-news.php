<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(-1);

class News{
	public function __construct($file_get_contents){
		$this->file_get_contents = file_get_contents($file_get_contents);
	}
	public function newsStr(){
		return $this->file_get_contents;
	}
	public function newsArray(){
		return json_decode($this->newsStr(), true);
	}
	public function newsCells(){
		return $this->newsArray()['news'];
	}
	public function newsTitle(){
		return $this->newsCells()['title'];
	}
	public function newsDate(){
		return $this->newsCells()['date'];
	}
	public function newsAuthor(){
		return $this->newsCells()['author'];
	}
	public function newsDescription(){
		return $this->newsCells()['description'];
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Новости сайта</title>
		<link rel="stylesheet" href="./style.css">
	</head>
<body>
	<div class="content">
		<h2>Последние новости</h2>
		<div class="news">
			<?php $news1 = new News('news1.json');?>
			<div class="title"><?php echo $news1->newsTitle()?></div>
			<div class="description"><?php echo $news1->newsDescription()?></div>
			<div class="date inline-block"><span>Дата:</span> <?php echo $news1->newsDate()?></div>
			<span>|</span>
			<div class="author inline-block"><span>Добавил</span> <?php echo $news1->newsAuthor()?></div>
		</div>
		
		<div class="news">
			<?php $news1 = new News('news2.json');?>
			<div class="title"><?php echo $news1->newsTitle()?></div>
			<div class="description"><?php echo $news1->newsDescription()?></div>
			<div class="date inline-block"><span>Дата:</span> <?php echo $news1->newsDate()?></div>
			<span>|</span>
			<div class="author inline-block"><span>Добавил</span> <?php echo $news1->newsAuthor()?></div>
		</div>
		
		<div class="news">
			<?php $news1 = new News('news3.json');?>
			<div class="title"><?php echo $news1->newsTitle()?></div>
			<div class="description"><?php echo $news1->newsDescription()?></div>
			<div class="date inline-block"><span>Дата:</span> <?php echo $news1->newsDate()?></div>
			<span>|</span>
			<div class="author inline-block"><span>Добавил</span> <?php echo $news1->newsAuthor()?></div>
		</div>
	</div>
</body>
</html>
