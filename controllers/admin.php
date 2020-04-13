<?php


Class Controller_Admin Extends Controller_Base {


		function index() {
			$model=$this->model('admin');

			$_SESSION['message']='';

			$page=1;
			if(isset($_REQUEST['page'])) $page = $_REQUEST['page'];
			$notesOnPage=3;
			$from=($page-1)*$notesOnPage;
			$count=$model->countOfPages();

			if(isset($_GET['sort'])){
				$_SESSION['sort']=$_GET['sort'];
			}
			$data=$model->returnData($from, $notesOnPage, $_SESSION['sort']);

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
			$this->registry['template']->set('data', $data);
			$this->registry['template']->set('count', $count);
			$this->registry['template']->set('notesOnPage', $notesOnPage);
			$this->registry['template']->set('page', $page);
			if(isset($_SESSION['admin'])){
				if($_SESSION['admin']==true){
					$this->registry['template']->show('admin');
				}
			}

		}


}


?>