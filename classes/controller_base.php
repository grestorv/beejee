<?php


Abstract Class Controller_Base {

		protected $registry;


		function __construct($registry) {

				$this->registry = $registry;

		}
		public function model($model)
		{
		  require_once('models/'.$model.'.php');
		  $model="Model_$model";
		  return new $model($this->registry);
		}

		abstract function index();

}


?>
