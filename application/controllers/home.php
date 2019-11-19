<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index(){		
		$data['title'] = 'Home';
		$data['page'] = 'home';
		$data['content'] = 'home';

		$this->load->model('portfolio_model');
		$this->load->model('news_model');

		$data['portfolio'] = $this->portfolio_model->getList_(4,0);
		$data['news'] = $this->news_model->getList(6,0);
		$this->load->view('site/template', $data);
	}

	function about(){
		$data['title'] = 'About';
		$data['page'] = 'about';
		$data['content'] = 'about';
		$this->load->view('site/template', $data);			
	}

	function blog(){
		redirect('https://medium.com/islandcap','refresh');
	}
	
	function partners(){
		$data['title'] = 'Partners';
		$data['page'] = 'partners';
		$data['content'] = 'partners';
		$this->load->view('site/template', $data);			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */