<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('team_model');
	}

	public function index($category = 'keyteam'){		
		$data['title'] = 'Team';
		$data['page'] = 'team';
		$data['content'] = 'team';
		$data['category'] = $category;
		$data['team'] = $this->team_model->getAllteam();
		$this->load->view('site/template', $data);
	}

	function detail($id, $title){
		$data['title'] = 'Team - '.rawurldecode($title);
		$data['page'] = 'team';
		$data['content'] = 'team-detail';
		$data['row'] = $this->team_model->getteam($id);

		$this->load->view('site/template', $data);			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */