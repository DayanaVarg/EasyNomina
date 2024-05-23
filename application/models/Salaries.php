<?php
class Salaries extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	//Lista nominas del empleado
	public function getSalary($id){
			$this->db->join('TB_EMPLOYEE', 'TB_EMPLOYEE.IDENTIFICATION = TB_SALARY.IDENTIFICATION');
			$sql = $this->db->get_where('TB_SALARY', array('TB_SALARY.IDENTIFICATION' => $id));
			if(!$sql->result()){
				return false;
			}return $sql->result();
	}

	//creacion de una nueva nomina
	public function  create($datos){

		$datos['DATE_STAR'] = "TO_DATE('{$datos['DATE_STAR']}', 'YYYY-MM-DD')";
        $datos['DATE_END'] = "TO_DATE('{$datos['DATE_END']}', 'YYYY-MM-DD')";
        
        $this->db->set('IDENTIFICATION', $datos['IDENTIFICATION']);
        $this->db->set('DATE_STAR', $datos['DATE_STAR'], false);
        $this->db->set('DATE_END', $datos['DATE_END'], false);
        $this->db->set('PAYMENT', $datos['PAYMENT']);
        if(!$this->db->insert('TB_SALARY')){
			return false;
		}
		return true;
	}

	//lista nomina especifica
	public function getSalaryE($idSa){
		 $this->db->select("ID_NOM, IDENTIFICATION, TO_CHAR(DATE_STAR, 'YYYY-MM-DD') AS DATE_STAR, TO_CHAR(DATE_END, 'YYYY-MM-DD') AS DATE_END, PAYMENT");
		 $nom = $this->db->get_where('TB_SALARY', array('ID_NOM' => $idSa), 1);
		 return $nom->row_array();
	}

	//Actualiza nomina
	public function updateSa($id,$datos){
		$dateStar = "TO_DATE('{$datos['DATE_STAR']}', 'YYYY-MM-DD')";
        $dateEnd= "TO_DATE('{$datos['DATE_END']}', 'YYYY-MM-DD')";
		
		$this->db->set('DATE_STAR', $dateStar, false);
        $this->db->set('DATE_END', $dateEnd, false);
        $this->db->set('PAYMENT', $datos['PAYMENT']);
		$this->db->where('ID_NOM', $id);
		if(!$this->db->update('TB_SALARY')){
			return false;
		}
		return true;
	}

	//Eliminar Nómina
	public function dropSa($idSa){
		if(!$this->db->delete('TB_SALARY', array('ID_NOM' => $idSa))){
			return false;
		}
		return true;
}

}