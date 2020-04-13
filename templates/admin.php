Admin page <br>
<?php
foreach ($data as $key => $value) {
	if($value['complete']==0)
	$complete='Не выполнено';
	else $complete='Выполнено';
	echo $value['name'].' '.$value['email'].' '.$value['text'].' '.$complete.' <a href="/edit?id='.$value['id'].'">изменить</a>'.'<br>';
}

?>
				</br>
				Новая задача
				<form action="" method="GET">
					<input type="text" name="name" placeholder="Имя">
					<input type="text" name="email" placeholder="Email">
					<input type="text" name="text" placeholder="Текст задачи">
					<input type="submit">
				</form>