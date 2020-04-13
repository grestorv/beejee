

<?php
$id=$data['id'];
if(isset($_COOKIE['name'])) $name=$_COOKIE['name'];
else $name=$data['name'];
if(isset($_COOKIE['email'])) $email=$_COOKIE['email'];
else $email=$data['email'];
if(isset($_COOKIE['text'])) $text=$_COOKIE['text'];
else $text=$data['text'];
if(isset($_COOKIE['complete'])) $complete=$_COOKIE['complete'];
else $complete=$data['complete'];
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
					<input id="id" class="form-control" type="hidden" name="id" value="<?=$id?>">
					<input id="name" class="form-control" type="text" name="name" value="<?=$name?>">
					<input id="email" class="form-control" type="text" name="email" value="<?=$email?>">
					<textarea id="text" class="form-control" name="text"><?=$text?></textarea>
					<p><span class="text">Выполнено</span>
					<input id="complete" type="checkbox" class="form-check-input" name="complete" value="1"<?=$checked?>>
					</p>
					<input type="submit" class="btn btn-info btn-block" value="Сохранить">
				</form>
			</div>
		</body>
			<script>
		let elem1 = document.getElementById('name');
		elem1.oninput = function() {
     		document.cookie = "name="+elem1.value;
   		};

		let elem2 = document.getElementById('email');
		elem2.oninput = function() {
     		document.cookie = "email="+elem2.value;
   		};

   		let elem3 = document.getElementById('text');
		elem3.oninput = function() {
     		document.cookie = "text="+elem3.value;
   		};
   		let elem4 = document.getElementById('complete');
		elem4.onchange = function() {
			if (elem4.checked) {
     		document.cookie = "complete=1";
     		}
     		else document.cookie = "complete=0";
   		};


	</script>
</html>