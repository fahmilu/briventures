<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Whitepaper extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('whitepaper_model');
	}

	public function index(){		
		$data['title'] = 'whitepaper';
		$data['page'] = 'whitepaper';
		$data['content'] = 'whitepaper';

		$data['page_offset'] = (int)$this->uri->segment(2);
		$config['uri_segment'] = 2;
		$config['per_page'] = '10';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<span class="active">';
		$config['cur_tag_close'] = '</span>';
		$config['base_url'] = base_url().'whitepaper/';
		$data['total_rows'] = $config['total_rows'] = $this->whitepaper_model->getListCount();
		$data['archived'] = $this->whitepaper_model->get_archived();
		
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();

		$data['whitepaper'] = $this->whitepaper_model->getList($config['per_page'], $data['page_offset']);

		$this->load->view('site/template', $data);
	}

	function archived($year){		
		$data['title'] = 'whitepaper';
		$data['page'] = 'whitepaper';
		$data['content'] = 'whitepaper-archived';

		$data['year'] = $year;

		$data['whitepaper'] = $this->whitepaper_model->getList_archived($year);

		$this->load->view('site/template', $data);
	}

	public function addlist($offset){		

		$data['whitepaper'] = $this->whitepaper_model->getList(4, $offset);

		echo $this->load->view('site/pages/whitepaper-list', $data);
	}

	function detail($id, $title){
		$data['title'] = 'whitepaper - '.rawurldecode($title);
		$data['page'] = 'whitepaper';
		$data['content'] = 'whitepaper-detail';
		$data['row'] = $this->whitepaper_model->getwhitepaper($id);

		$this->load->view('site/template', $data);			
	}

	function whitepaper(){
		$data['title'] = 'White Paper';
		$data['page'] = 'white Paper';
		$data['content'] = 'whitepaper';
		$data['row'] = $this->whitepaper_model->getwhitepaper();

		$this->load->view('site/template', $data);			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */