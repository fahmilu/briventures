<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        function __construct()
	{
		parent::__construct();
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		// $this->load->model('home_model');
	}
	
       
	public function index()
	{
	     redirect('webadmin/dashboard');
	}

	function dashboard(){
		$data['title'] = 'Dashboard';
		$data['menu'] = 'dashboard';
		$data['content'] = 'webadmin/dashboard';
		// $data['content_data'] = '';

		$this->load->view('webadmin/template', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */