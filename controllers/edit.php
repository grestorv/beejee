<?php


Class Controller_Edit Extends Controller_Base {


		function index() {
			if($_SESSION['admin']==false) {
				header("Location: /login");
				die();
			}
			$model=$this->model('edit');
			$id=$_GET['id'];
			$data=$model->returnData($id);
			if(isset($_POST['name']) AND isset($_POST['email'])){
				if(isset($_POST['complete'])){
					if($_POST['complete']==1) $complete=1;
					else $complete=0;
				}
				else $complete=0;
				if($_POST['text']!=$data['text']){
					$result=$model->updateData($id, $_POST['name'], $_POST['email'], $_POST['text'], $complete, 1);
				}
				else $result=$model->updateData($id, $_POST['name'], $_POST['email'], $_POST['text'], $complete, 0);
				setcookie("name","",time()-3600,"/");
				setcookie("email","",time()-3600,"/");
				setcookie("text","",time()-3600,"/");
				setcookie("complete","",time()-3600,"/");
				header("Location: /admin");
				die();
			}


			$this->registry['template']->set('data', $data);
			$this->registry['template']->show('edit');
		}


}


?>