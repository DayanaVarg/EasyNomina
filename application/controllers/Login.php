<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('Auth');
		$this->load->library('session');
	
	}


	public function index()
	{
		$this->load->view('auth/login');

	}

	
	public function validation()
	{
		$iden = $this->input->post('iden');
		$pass = $this->input->post('pass');
		if (!$res = $this->Auth->login($iden)){
			$data['msg'] ='Datos de usuario inválidos';
			$this->load->view('auth/login', $data);
		}elseif(!password_verify($pass, $res->PASSWORD)) {
			$data['msg'] ='Datos de usuario inválidos';
			$this->load->view('auth/login', $data);
		}else{
			$data = array(
				'IDENTIFICATION' => $res->identification,
				'NAME' => $res->name,
				'LASTNAME' => $res->lastname,
				'PHONE' => $res->phone,
                'EMAIL' => $res->email,
				'PASS'=> $res->password,
				'is_logged' => TRUE,
            );
			$this->session->set_userdata($data);
			redirect(base_url('admin/dashboard'));
		
		}
	}

	public function logout(){
		$vars = array('identification', 'name','lastname',  'phone' , 'email','pass', 'is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect('login');
	}
}

