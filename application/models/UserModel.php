<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 3/30/19
 * Time: 7:37 PM
 */

class UserModel extends CI_Model
{
	public $db_name = "users";

	public function __construct()
	{
		$this->load->database();
	}

	public function getAll( $limit=20 )
	{
		$data = array();
		$query = $this->db->get($this->db_name, $limit);
		foreach($query->result() as $result){
			$data[] = $this->getApiData($result);
		}
		return $data;
	}

	public function getOne($id){
		$query = $this->db->get_where($this->db_name, array('id' => $id));
		$data = $this->getApiData( $query->result()[0] );
		return $data;
	}

	private function getApiData( $data ){
		return array(
			"firstname" => $data->first_name,
			"lastname" => $data->last_name,
			"fullname" => $data->first_name . ' ' . $data->last_name,
			"gender" => $data->gender,
			"age" => $data->age,
			"email" => $data->email,
			"phone" => $data->phone
		);
	}

}
