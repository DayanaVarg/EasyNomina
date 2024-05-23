<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('Employees');
		$this->load->model('Salaries');
	}

//---------- functions empleados-----------
	public function create(){
		if($this->session->userdata('is_logged')){
			$tipoIde = $this->input->post('tipoIde');
			$identification = $this->input->post('ide');
			$name = $this->input->post('name');
			$lastname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$position= $this->input->post('position');
			$area= $this->input->post('area');

			$datos = array(
				'TIPO_IDE' => $tipoIde,
				'IDENTIFICATION' => $identification,
				'NAME' => $name,
				'LASTNAME' => $lastname,
				'EMAIL' => $email,
				'POSITION' => $position,
				'AREA' => $area,
				'STATE'=>1,
			);

			if(!$this->Employees->create($datos)){
				$this->session->set_flashdata('error', 'Ha ocurrido un error al registrarlo, intenta de nuevo');
				redirect('employee/showEmployee');
			}
			$this->session->set_flashdata('msg', 'Se ha registrado con éxito');
			redirect('employee/showEmployee');
		}else{
			redirect('login');
		}
	}

	public function update(){
		if($this->session->userdata('is_logged')){
			$tipoIde = $this->input->post('tipoIde');
			$identification = $this->input->post('ide');
			$name = $this->input->post('name');
			$lastname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$position= $this->input->post('position');
			$area= $this->input->post('area');

			$datos = array(
				'TIPO_IDE' => $tipoIde,
				'IDENTIFICATION' => $identification,
				'NAME' => $name,
				'LASTNAME' => $lastname,
				'EMAIL' => $email,
				'POSITION' => $position,
				'AREA' => $area,
				'STATE'=>1,
			);

			if(!$this->Employees->update($identification, $datos)){
				$this->session->set_flashdata('error', 'Ha ocurrido un error al actualizarlo, intenta de nuevo');
				redirect('employee/showEmployee');
			}
			$this->session->set_flashdata('msg', 'Se ha actualizado correctamente');
			redirect('employee/showEmployee');

		}else{
			redirect('login');
		}
	}

	//Inactivar empleado
	public function inactivEmp($IDENTIFICATION){
		if(!$this->Employees->inactivEmp($IDENTIFICATION)){
			$this->session->set_flashdata('error', 'Ha ocurrido un error al inactivarlo, intenta de nuevo');
			redirect('employee/showEmployee');
		}
		$this->session->set_flashdata('msg', 'Se ha inactivado correctamente');
		redirect('employee/showEmployee');
	}

	//Activar empleado
	public function activEmp($IDENTIFICATION){
		if(!$this->Employees->activEmp($IDENTIFICATION)){
			$this->session->set_flashdata('error', 'Ha ocurrido un error al activarlo, intenta de nuevo');
			redirect('employee/showEmployee');
		}
		$this->session->set_flashdata('msg', 'Se ha activado correctamente');
		redirect('employee/showEmployee');
	}

//---------- functions Nómina-----------

	//nueva nómina
	public function createSa(){
		if($this->session->userdata('is_logged')){
			$identification = $this->input->post('identification');
			$dateStart = $this->input->post('dateStart');
			$dateEnd = $this->input->post('dateEnd');
			$salary = $this->input->post('salary');
			
			$datos = array(
				'IDENTIFICATION' => $identification,
				'DATE_STAR' => $dateStart,
				'DATE_END' => $dateEnd,
				'PAYMENT' => $salary,
			);

			if(!$this->Salaries->create($datos)){
				$this->session->set_flashdata('error', 'Ha ocurrido un error al registrar, intenta de nuevo');
				redirect('employee/viewSalary/'.$identification);
			}
			$this->session->set_flashdata('msg', 'Se ha registrado con éxito');
			redirect('employee/viewSalary/'.$identification);
		}else{
			redirect('login');
		}
	}

	//actualizar nómina
	public function updateS(){
		if($this->session->userdata('is_logged')){
			$id = $this->input->post('idSa');
			$identification = $this->input->post('id');
			$dateStart = $this->input->post('dateStart');
			$dateEnd = $this->input->post('dateEnd');
			$salary = $this->input->post('salary');

			$datos = array(
				'ID_NOM' => $id,
				'DATE_STAR' => $dateStart,
				'DATE_END' => $dateEnd,
				'PAYMENT' => $salary,
			);

			if(!$this->Salaries->updateSa($id, $datos)){
				$this->session->set_flashdata('error', 'Ha ocurrido un error al editar, intenta de nuevo');
				redirect('employee/viewSalary/'.$identification);
			}
			$this->session->set_flashdata('msg', 'Se ha editado correctamente');
			redirect('employee/viewSalary/'.$identification);

		}else{
			redirect('login');
		}
	}

	//Activar empleado
	public function dropSa($ID_NOM, $IDENTIFICATION){
		if(!$this->Salaries->dropSa($ID_NOM)){
			$this->session->set_flashdata('error', 'Ha ocurrido un error al eliminar el registro, intenta de nuevo');
			redirect('employee/viewSalary/'.$IDENTIFICATION);
		}
		$this->session->set_flashdata('msg', 'Se ha eliminado correctamente');
		redirect('employee/viewSalary/'.$IDENTIFICATION);
	}



//--------------------------------  views -------------------------------
	
//--- empleado
	//Lista todos los empleados actvios
	public function showEmployee(){
		if($this->session->userdata('is_logged')){
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer'=>$this->load->view('layout/footer', '', TRUE),
				'emp' => $this->Employees->getEmp(),
				'script_url' => base_url('assets/js/function.js') 
			);
			$this->load->view('admin/dashboard',$data);
		}else{
			redirect('login');
		}
	}

	//Creación nuevo empleado
	public function newEmp(){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
			);
			$this->load->view('employee/registerEmp', $data);
		}else{
			redirect('login');
		}
	}

	
	//Formulario Actualizar
	public  function updateEmp($IDENTIFICATION){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
				'emp'=>$this->Employees->getEmployee($IDENTIFICATION),
			);

			$this->load->view('employee/updateEmp', $data);
		}else{
			redirect('login');
		}
	}

	//Lista todos los empleados inactivos
	public function showEmployeeInac(){
		if($this->session->userdata('is_logged')){
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer'=>$this->load->view('layout/footer', '', TRUE),
				'emp' => $this->Employees->getEmpInac(),
			);
			$this->load->view('employee/inactEmp',$data);
		}else{
			redirect('login');
		}
	}

//-- nómina -----

	//vista nómina 
	public function viewSalary($IDENTIFICATION){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
				'nom' => $this->Salaries->getSalary($IDENTIFICATION),
				'script_url' => base_url('assets/js/function.js'),
				'id'=>$IDENTIFICATION,
			);
			$this->load->view('employee/salaryEmp', $data);
		}else{
			redirect('login');
		}
	}

	//formulario registro nómina
	public function newSala($id){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
				'id'=>$id,
			);
			$this->load->view('employee/registerSala', $data);
		}else{
			redirect('login');
		}
	}

	//formulario editar nómina
	public function updateSa($ID_NOM, $IDENTIFICATION){
		if($this->session->userdata('is_logged')) {
			$data = array(
				'navbar' => $this->load->view('layout/navbar', '', TRUE),
				'footer' => $this->load->view('layout/footer', '', TRUE),
				'nom'=>$this->Salaries->getSalaryE($ID_NOM),
				'id'=>$IDENTIFICATION,
			);
			$this->load->view('employee/updateSala', $data);
		}else{
			redirect('login');
		}
	}





}

?>