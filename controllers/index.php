<?php


Class Controller_Index Extends Controller_Base {


		function index() {

			if(!isset($_SESSION['sort'])) $_SESSION['sort']='name';
			$model=$this->model('index');
			$page=1;
			$_SESSION['message']='';
			if(isset($_REQUEST['page'])) $page = $_REQUEST['page'];
			$notesOnPage=3;
			$from=($page-1)*$notesOnPage;
			$count=$model->countOfPages();


			if(isset($_GET['sort'])){
				if($_SESSION['sort']!=$_GET['sort']){
					$_SESSION['sort']=$_GET['sort'];
				}
				else $_SESSION['sort']=$_GET['sort'].' DESC';
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
			$this->registry['template']->show('index');


		}


}


?>