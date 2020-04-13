<?php


Class Controller_Admin Extends Controller_Base {


		function index() {
			$model=$this->model('admin');
			$page=1;
			if(isset($_REQUEST['page'])) $page = $_REQUEST['page'];
			$notesOnPage=3;
			$from=($page-1)*$notesOnPage;
			$count=$model->countOfPages();

			$data=$model->returnData($from, $notesOnPage);

			if(isset($_REQUEST['name']) AND isset($_REQUEST['email'])){
				$model->insertData($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['text']);
				header("Location: /admin");
				die();
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