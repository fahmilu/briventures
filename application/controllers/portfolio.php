<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('portfolio_model');
	}

	public function index(){		
		$data['title'] = 'Portfolio';
		$data['page'] = 'portfolio';
		$data['content'] = 'portfolio';
		// $data['tag'] = '';
		// $data['tags'] = $this->portfolio_model->getTag();

		$data['portfolio'] = $this->portfolio_model->getAllportfolio();
		$this->load->view('site/template', $data);
	}

	function detail($id, $title){
		if(!$this->portfolio_model->CheckPortfolioExist($id)){ redirect('','refresh'); }
		$data['title'] = 'Portfolio - '.rawurldecode($title);
		$data['page'] = 'portfolio';
		$data['referer'] = site_url('portfolio');
		$data['content'] = 'portfolio-detail';
		$data['row'] = $this->portfolio_model->getportfolio($id);

		$this->load->view('site/template', $data);			
	}

	// function tag($tag){
	// 	$data['title'] = 'Portfolio';
	// 	$data['page'] = 'portfolio';
	// 	$data['content'] = 'portfolio';
	// 	$data['tag'] = $tag;

	// 	$data['tags'] = $this->portfolio_model->getTag();

	// 	$data['portfolio'] = $this->portfolio_model->getAllportfolioByTag($tag);
	// 	$this->load->view('site/template', $data);		
	// }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */