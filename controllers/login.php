<?php


Class Controller_Login Extends Controller_Base {


		function index() {

			if(isset($_REQUEST['login']))
			{
				$login=$_REQUEST['login'];
				$pass=$_REQUEST['pass'];
				if($login=='admin' AND $pass=='123'){
					$_SESSION['admin']=true;
					header("Location: /admin");
					die();
				}
				else $_SESSION['admin']=false;
			}
			$this->registry['template']->show('login');

		}


}


?>