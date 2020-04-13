
Edit page <br>
<?php
$id=$data['id'];
$name=$data['name'];
$email=$data['email'];
$text=$data['text'];
$complete=$data['complete'];
if($complete==0) $checked='';
else $checked=' checked';
?>
				</br>
				Редактирование задачи
				<form action="" method="GET">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="text" name="name" value="<?=$name?>">
					<input type="text" name="email" value="<?=$email?>">
					<textarea name="text"><?=$text?></textarea>
					<input type="checkbox" name="complete" value="1"<?=$checked?>>
					<input type="submit">
				</form>