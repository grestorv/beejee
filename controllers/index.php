<?php


Class Controller_Index Extends Controller_Base {


		function index() {
			$model=$this->model('index');
			$page=1;
			if(isset($_REQUEST['page'])) $page = $_REQUEST['page'];
			$notesOnPage=3;
			$from=($page-1)*$notesOnPage;
			$count=$model->countOfPages();

			$data=$model->returnData($from, $notesOnPage);

			if(isset($_REQUEST['name']) AND isset($_REQUEST['email'])){
				$model->insertData($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['text']);
				header("Location: /");
				die();
			}
			$this->registry['template']->set('data', $data);
			$this->registry['template']->set('count', $count);
			$this->registry['template']->set('notesOnPage', $notesOnPage);
			$this->registry['template']->set('page', $page);
			$this->registry['template']->show('index');


		}


}


?>