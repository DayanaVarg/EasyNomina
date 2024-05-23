<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Model{

    function __construct(){
		$this->load->database();
	}

	//Inserción nuevo empleado
	public function create($datos){
		if($this->input->server('REQUEST_METHOD')==='POST') {
			if (!$this->db->insert('TB_EMPLOYEE', $datos)) {
				return false;
			}
			return true;
		}else{
			show_404();
		}
	}

	//lista de todos los empleados activos
	public  function  getEmp(){
		$sql = $this->db->get_where('TB_EMPLOYEE', array('TB_EMPLOYEE.STATE' => 1));
		if(!$sql->result()){
			return false;
		}return $sql->result();
	}	

	//lista empleado especifico
	public function getEmployee($id){
		$emp = $this->db->get_where('TB_EMPLOYEE', array('TB_EMPLOYEE.IDENTIFICATION' => $id), 1);
		return $emp->row_array();

	}

	//Actualiza empleado
	public function update($id,$datos){
		$this->db->where('IDENTIFICATION', $id);
		if(!$this->db->update('TB_EMPLOYEE', $datos)){
			return false;
		}
		return true;
	}
	//Inactivar Empleado
	public function inactivEmp($id){
		$this->db->set('STATE', '0');
		$this->db->where('IDENTIFICATION', $id);
		if(!$this->db->update('TB_EMPLOYEE')){
			return false;
		}
		return true;
	}

	//lista de todos los empleados inactivos
	public  function  getEmpInac(){
		$sql = $this->db->get_where('TB_EMPLOYEE', array('TB_EMPLOYEE.STATE' => 0));
		if(!$sql->result()){
			return false;
		}return $sql->result();
	}

	//Activar Empleado
	public function activEmp($id){

		$this->db->set('STATE', '1');
		$this->db->where('IDENTIFICATION', $id);
		if(!$this->db->update('TB_EMPLOYEE')){
			return false;
		}
		return true;

	}

}

?>