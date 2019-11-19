<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index(){		
		$data['title'] = 'news';
		$data['page'] = 'news';
		$data['content'] = 'news';

		// $data['page_offset'] = (int)$this->uri->segment(2);
		// $config['uri_segment'] = 2;
		// $config['per_page'] = '10';
		// $config['full_tag_open'] = '<div class="pagination">';
		// $config['full_tag_close'] = '</div>';
		// $config['cur_tag_open'] = '<span class="active">';
		// $config['cur_tag_close'] = '</span>';
		// $config['base_url'] = base_url().'news/';
		// $data['total_rows'] = $config['total_rows'] = $this->news_model->getListCount();
		$data['total_rows'] = $this->news_model->getListCount();
		$data['archived'] = $this->news_model->get_archived();
		
		// $this->pagination->initialize($config); 
		// $data['pagination'] = $this->pagination->create_links();

		// $data['news'] = $this->news_model->getList($config['per_page'], $data['page_offset']);

		$this->load->view('site/template', $data);
	}

	function archived($year){		
		$data['title'] = 'news';
		$data['page'] = 'news';
		$data['content'] = 'news-archived';

		$data['year'] = $year;
		$data['total_rows'] = $this->news_model->getListCount();
		$data['archived'] = $this->news_model->get_archived();
		$data['news'] = $this->news_model->getList_archived($year);

		$this->load->view('site/template', $data);
	}

	public function addlist($offset){		

		$data['news'] = $this->news_model->getList(4, $offset);

		echo $this->load->view('site/pages/news-list', $data);
	}

	function detail($id, $title){
		$data['title'] = 'news - '.rawurldecode($title);
		$data['page'] = 'news';
		$data['content'] = 'news-detail';
		$data['total_rows'] = $this->news_model->getListCount();
		$data['archived'] = $this->news_model->get_archived();
		$data['row'] = $this->news_model->getnews($id);

		$this->load->view('site/template', $data);			
	}

	function whitepaper(){
		$data['title'] = 'White Paper';
		$data['page'] = 'white Paper';
		$data['content'] = 'whitepaper';
		$data['row'] = $this->news_model->getwhitepaper();

		$this->load->view('site/template', $data);			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */