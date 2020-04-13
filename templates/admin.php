<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Админка</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Задачи</h1>
				<div>
				<nav>
				  <ul class="pagination">
	<?php
	if($page==1) $class=' class="disabled"';
	else $class ='';
	print ("<li$class><a href=\"?page=".($page-1)."\"  aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a></li>");
	for($i=1;$i<=ceil($count/$notesOnPage);$i++){
		if($i==$page) $class = ' class="active"';
		else $class='';
		echo "<li $class><a href=\"?page=$i\">$i</a></li>";
	}
	if($page==ceil($count/$notesOnPage)) $class=' class="disabled"';
	else $class = '';
	echo "<li$class><a href=\"?page=".($page+1)."\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
?> 
					  </ul>
				</nav>

<?php
	foreach ($data as $key => $value) {

	if($value['complete']==0)
	$complete='Не выполнено';
	else $complete='Выполнено';
	?>
	<div class="note">
			<p>
				<span class="name"><?=$value['name']?></span>
				<span class="email"><?=$value['email']?></span>
				<span class=""><?=$value['text']?></span>
				<span class=""><?=$complete?></span>
				<span><a href="/edit?id=<?=$value['id']?>">изменить</a></span>
			</p>
	</div>
	<?php
	//echo $value['name'].' '.$value['email'].' '.$value['text'].' '.$complete.'<br>';
}

?>
			<span class="text">Новая задача</span>
			<div id="form">
				<form action="#form" method="POST">
					<input class="form-control" type="text" name="name" placeholder="Имя">
					<input class="form-control" type="text" name="email" placeholder="Email">
					<textarea name="text" placeholder="Текст задачи"></textarea>
					<input type="submit" class="btn btn-info btn-block" value="Сохранить">
				</form>
			</div>
		</body>
</html>
