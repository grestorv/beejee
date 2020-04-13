<?php


Class Controller_Members Extends Controller_Base {


		function index() {

				$this->registry['template']->set('first_name', 'Gosha');
				$this->registry['template']->show('index');

		}


		function view() {

				echo 'You are viewing the members/view request';

		}


}


?>