<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('file');
		$this->load->helper('directory');
		$this->load->helper('array');
		$this->load->helper('common_function');
		
		$this->load->library('tank_auth');
	    $this->load->library('session');
		$this->load->library('user_agent');
		$this->load->library('googlemaps');
		$this->load->library('excel');
		
		$this->load->model('tank_auth/users');
		$this->load->model('usermenu');
		$this->load->model('post');
		$this->load->model('dashboard');
		$this->load->model('search');
		$this->load->model('backend');
	}

	function index()
	{
		$data['title'] = 'Upload Title';
		$data['title_h1'] = 'Page Upload';
		$this->load->view('templates/header',$data);
		$this->load->view('pages/upload_form', array('error' => ' ' ));
		$this->load->view('templates/footer',$data);
	}
	
	function ChkLogin()
	{
	    if (!$this->tank_auth->is_logged_in()) {
			return 0;
	    } else {
			return 1;
		}
	}

	function lang_check()
	{
		if (!$this->session->userdata('lang')){
			$this->session->set_userdata('lang','th');
		};
	}

	function header_inc($ChkLogin)
	{
		if ($ChkLogin==0) {
			$sess_id = $this->session->userdata('user_id');
			if(!empty($sess_id)){
				$this->session->sess_destroy();
			};
			$data="header_nonauth";
		} else {
			$data="header_auth";
		}
		return $data;	
	}

	function user_profile($ChkLogin)
	{
		if ($ChkLogin==0) {
			$data["Name"]="No_Profile";
			$sess_id = $this->session->userdata('user_id');
			if(!empty($sess_id)){
				$this->session->sess_destroy();
			};
		} else {
			$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
			$data['firstname'] = $user_data->firstname;
			$data['lastname'] = $user_data->lastname;
			if( !$this->session->userdata('image') == '' ){
				$data['image'] = $this->session->userdata('image');
			}else{
				$data['image'] = '/images/blank_man.gif';
			};
			$data['lang'] = $this->session->userdata('lang');
		};
		return $data;
	}
	
	public function upload_project()
	{
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==1){
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$data['title'] = 'Upload Title';
			$data['title_h1'] = 'Page Upload';
			$this->load->view($header,$profile);
			$this->load->view('pages/upload_project',$data);
			$this->load->view('footerstandard');
			$this->load->view('footer_home');
		}
	}

	function do_upload()
	{
		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|xls|xlsx';
		//$config['max_size']	= '2048kb';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('pages/upload_form', $error);
		}
		else
		{
			$upload_data = $this->upload->data();
			$data = array('upload_data' => $upload_data);
			$filename = $upload_data['file_name'];
			$filetype = $this->input->post('file_type');

			$this->post->excelData($filename,$filetype);
			$ChkLogin=$this->ChkLogin();
			$header=$this->header_inc($ChkLogin);
			$profile=$this->user_profile($ChkLogin);
			$this->load->view($header,$profile);
			$this->load->view('pages/upload_success', $data);
			$this->load->view('footerstandard');
			$this->load->view('footer_home');
		}
	}
}
?>