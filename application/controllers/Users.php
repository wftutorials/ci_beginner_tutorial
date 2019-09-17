<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function first(){
		echo "This is the first user";
	}

	public function second()
	{
		echo $this->test();
	}

	private function test(){
		return "This is a private function";
	}


	public function getAll(){

	}
	
	public function getOne()
	{
		$this->load->model('UserModel');
		var_dump($this->UserModel->getOne(2));
	}


}
