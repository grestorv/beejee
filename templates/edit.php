

<?php
$id=$data['id'];
$name=$data['name'];
$email=$data['email'];
$text=$data['text'];
$complete=$data['complete'];
if($complete==0) $checked='';
else $checked=' checked';
?>
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
			<h1>Редактирование</h1>
				<div>
					<span class="text">Новая задача</span>
			<div id="form">
				<form action="#form" method="POST">
					<input class="form-control" type="hidden" name="id" value="<?=$id?>">
					<input class="form-control" type="text" name="name" value="<?=$name?>">
					<input class="form-control" type="text" name="email" value="<?=$email?>">
					<textarea class="form-control" name="text"><?=$text?></textarea>
					<p><span class="text">Выполнено</span>
					<input type="checkbox" class="form-check-input" name="complete" value="1"<?=$checked?>>
					</p>
					<input type="submit" class="btn btn-info btn-block" value="Сохранить">
				</form>
			</div>
		</body>
</html>