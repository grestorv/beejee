<?php


Class Controller_Login Extends Controller_Base {


		function index() {

			if($_POST){
				if(empty($_REQUEST['name']) OR empty($_REQUEST['email']) OR empty($_REQUEST['text'])){				
					$_SESSION['message']='Заполните все поля';
				}
				else{
					if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
						$_SESSION['message']="E-mail адрес '{$_REQUEST['email']}' указан неверно.";
					}
					else{
						$_SESSION['message']="Success!";
						$model->insertData($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['text']);
					}
				}
			}

			if($_POST)
			{
				if(empty($_REQUEST['login']) OR empty($_REQUEST['pass'])){				
					$_SESSION['message']='Заполните все поля';
				}
				else{
					$login=$_REQUEST['login'];
					$pass=$_REQUEST['pass'];
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