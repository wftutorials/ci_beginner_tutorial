<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 3/30/19
 * Time: 7:05 PM
 */

class Api extends CI_Controller
{
	public function index(){
		$this->json_output(array(
			"test" => "test"
		));
	}

	public function users( $id="" ){
		$this->load->model('UserModel');
		if(empty($id)){
			$data = $this->UserModel->getAll($this->getLimit(30));
		}else{
			$data = $this->UserModel->getOne($id);
		}
		$this->json_output($data);
	}


	private function json_output( $data=array()){
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	private function getLimit($default=30){
		if(isset($_GET['limit'])){
			return $_GET['limit'];
		}else{
			return $default;
		}
	}

}
