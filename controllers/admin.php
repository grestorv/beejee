<?php


Class Controller_Admin Extends Controller_Base {


		function index() {
			$model=$this->model('admin');
			if(!isset($_SESSION['sort'])) $_SESSION['sort']='id';
			if(!isset($_SESSION['message'])) $_SESSION['message']='';

			$page=1;
			if(isset($_GET['page'])) $page = $_GET['page'];
			$notesOnPage=3;
			$from=($page-1)*$notesOnPage;
			$count=$model->countOfPages();
            $order="ASC";

			if(isset($_GET['sort'])){
				if($_SESSION['sort']!=$_GET['sort']){
					$_SESSION['sort']=$_GET['sort'];
                    $_SESSION['order']="ASC";
				}
				//else $_SESSION['sort']=$_GET['sort'].' DESC';
                else{
                    $_SESSION['sort']=$_GET['sort'];
                    if($_SESSION['order']=='ASC')
                        $_SESSION['order']="DESC";
                    else $_SESSION['order']='ASC';
                }
			}
			
			$data=$model->returnData($from, $notesOnPage, $_SESSION['sort'], $_SESSION['order']);

			if($_POST){
				if(empty($_POST['name']) OR empty($_POST['email']) OR empty($_POST['text'])){
					$_SESSION['message']='Заполните все поля';
				}
				else{
					if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
						$_SESSION['message']="E-mail адрес '{$_POST['email']}' указан неверно.";
					}
					else{
						$_SESSION['message']="Добавление прошло успешно";
						$model->insertData($_POST['name'], $_POST['email'], $_POST['text']);
						header("Location: /admin?page=$page");

						die();
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
				else{
					header("Location: /login");
					die();
				}
			}

		}


}


?>