<?php


Class Controller_Login Extends Controller_Base {


		function index() {

			if($_POST){
				if(empty($_POST['name']) OR empty($_POST['email']) OR empty($_POST['text'])){
					$_SESSION['message']='Заполните все поля';
				}
				else{
					if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
						$_SESSION['message']="E-mail адрес '{$_POST['email']}' указан неверно.";
					}
					else{
						$_SESSION['message']="Success!";
						$model->insertData($_POST['name'], $_POST['email'], $_POST['text']);
					}
				}
			}

			if($_POST)
			{
				if(empty($_POST['login']) OR empty($_POST['pass'])){
					$_SESSION['message']='Заполните все поля';
				}
				else{
					$login=$_POST['login'];
					$pass=$_POST['pass'];
					if($login=='admin' AND $pass=='123'){
						$_SESSION['admin']=true;
						header("Location: /admin");
						die();
					}
					else $_SESSION['message']='Неправильные реквизиты доступа';
				}
			}
			$this->registry['template']->show('login');

		}


}


?>