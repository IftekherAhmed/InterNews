<?php defined('BASEPATH') OR exit('No direct script access allowed');	

/****************************
	Controller Map
	1) Construcct
	2) Index [Default Controller]
	3) Login
	4) Logout
****************************/

class ct_login extends CI_Controller {	
	// 1) Construcct
	function __construct(){		
		parent::__construct();	
		$this->load->model('md_login', 'model');
	}

	// 2) Index [Default Controller]
	public function index(){		
		if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
			$data = array();
			$data['email']    = $_COOKIE['email'];
			$data['password'] = $_COOKIE['password'];			
			$data = $this->security->xss_clean($data);
			
			$user_query_data = $this->model->single_user_data($data['email']);			
			if($user_query_data != false){			
				$user_query_password = $this->encryption->decrypt($user_query_data->password);
				if($data['password'] === $user_query_password){
					if(isset($data['remember_me']) && $data['remember_me'] == 1){		
						$log_email = $data['email'];
						$log_password = $data['password'];				
						setcookie('email', $log_email, time() + (86400 * 30), "/"); // 86400 = 1day * 30 = 30 days
						setcookie('password', $log_password, time() + (86400 * 30), "/"); // 86400 = 1day * 30 = 30 days
					}else{}
					
					$filter = $this->security->xss_clean($data);
					$result = $this->model->login($filter);
					if($result){	
						if($result['position'] == "Admin" ||$result['position'] == "Moderator" ||$result['position'] == "Reporter"){
							$this->session->set_flashdata('success','Thanks for login.');
							redirect('ct_backend/index', 'refresh');
						}
					}else{
						$this->session->set_flashdata('error','Email or Password maybe be wrong.');
						redirect('ct_login/login_view', 'refresh');
					}
				}else{
					$this->session->set_flashdata('error','Email or Password maybe be wrong.');
					redirect('ct_login/login_view', 'refresh');
				}
			}else{
				$this->session->set_flashdata('error','Email or Password maybe be wrong.');
				redirect('ct_login/login_view', 'refresh');
			}		
		}else{
			redirect('ct_login/login_view', 'refresh');
		}
	}

	// 3) Login Page View
	public function login_view(){	
		$data = array();
		$data['site_title'] = $this->model->site_title($site_title_id = 1);	
		$data['page_title'] = "Login";
		$this->load->view('login/login', $data);
	}
	
	// 3) Login
	public function login(){	
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Validation faild! Please fill correctly.');		
			$data = array();
			$data['site_title'] = $this->model->site_title($site_title_id = 1);	
			$data['page_title'] = "Login";
			$this->load->view('login/login', $data);			
		}else{
			$data = $this->input->post();
			$data = $this->security->xss_clean($data);
			unset($data['login']);
			
			$user_query_data = $this->model->single_user_data($data['email']);
			if($user_query_data != false){			
				$user_query_password = $this->encryption->decrypt($user_query_data->password);
				if($data['password'] === $user_query_password){
					if(isset($data['remember_me']) && $data['remember_me'] == 1){		
						$log_email = $data['email'];
						$log_password = $data['password'];				
						setcookie('email', $log_email, time() + (86400 * 30), "/"); // 86400 = 1day, 86400*30 == 30days
						setcookie('password', $log_password, time() + (86400 * 30), "/"); // 86400 = 1day, 86400*30 == 30days
					}else{}
					
					$filter = $this->security->xss_clean($data);
					$result = $this->model->login($filter);
					if($result){	
						if($result['position'] == "Admin" ||$result['position'] == "Moderator" ||$result['position'] == "Reporter"){
							$this->session->set_flashdata('success','Thanks for login.');
							redirect('ct_backend/index', 'refresh');
						}
					}else{
						$this->session->set_flashdata('error','Email or Password maybe be wrong.');
						redirect('ct_login/login_view', 'refresh');
					}
				}else{
					$this->session->set_flashdata('error','Email or Password maybe be wrong.');
					redirect('ct_login/login_view', 'refresh');
				}
			}else{
				$this->session->set_flashdata('error','Email or Password maybe be wrong.');
				redirect('ct_login/login_view', 'refresh');
			}
		}	
	}
	
	// 4) Logout
	public function logout(){		
		setcookie('email', "", 0, "/");
		setcookie('password', "", 0, "/");		
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('success','Logout successful!');
		redirect('ct_login/login_view');		
	}
	
}
