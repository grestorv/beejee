<?php


Abstract Class Model_Base {

		protected $registry;


		function __construct($registry) {

				$this->registry = $registry;
				$this->db=$this->registry['db'];

		}



}


?>
