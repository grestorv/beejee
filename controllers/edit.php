<?php


Class Controller_Edit Extends Controller_Base {


		function index() {
			if($_SESSION['admin']==false) die();
			$model=$this->model('edit');
			$id=$_REQUEST['id'];
			$data=$model->returnData($id);
			if(isset($_REQUEST['name']) AND isset($_REQUEST['email'])){
				if(isset($_REQUEST['complete'])){
					if($_REQUEST['complete']==1) $complete=1;
					else $complete=0;
				}
				else $complete=0;

				$result=$model->updateData($id, $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['text'], $complete);
				header("Location: /admin");
				die();
			}


			$this->registry['template']->set('first_name', 'Gosha');
			$this->registry['template']->set('data', $data);
			$this->registry['template']->show('edit');
		}


}


?>