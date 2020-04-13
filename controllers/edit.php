<?php


Class Controller_Edit Extends Controller_Base {


		function index() {
			if($_SESSION['admin']==false) {
				header("Location: /");
				die();
			}
			$model=$this->model('edit');
			$id=$_REQUEST['id'];
			$data=$model->returnData($id);
			if(isset($_REQUEST['name']) AND isset($_REQUEST['email'])){
				if(isset($_REQUEST['complete'])){
					if($_REQUEST['complete']==1) $complete=1;
					else $complete=0;
				}
				else $complete=0;
				if($_REQUEST['text']!=$data['text']){
					$result=$model->updateData($id, $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['text'], $complete, 1);
				}
				else $result=$model->updateData($id, $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['text'], $complete, 0);
				header("Location: /admin");
				die();
			}


			$this->registry['template']->set('data', $data);
			$this->registry['template']->show('edit');
		}


}


?>