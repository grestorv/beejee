<?php


Class Controller_Logout Extends Controller_Base {


		function index() {

		
				$_SESSION['admin']=false;
				header("Location: /");
				die();
				}
			}


?>