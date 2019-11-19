<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Whitepaper extends CI_Controller {
        function __construct()
	{
		parent::__construct();
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		$this->load->model('whitepaper_model');
	}
	
       
	public function index()
	{	
		if($this->input->get('category')){
			$this->session->set_userdata('category', $this->input->get('category'));
		}else{
			$this->session->unset_userdata('category');
		}
	     redirect('webadmin/whitepaper/data');
	}

	function data(){
		if(isset($_SERVER['HTTP_REFERER'])){
			if(!preg_match("/whitepaper/",$_SERVER['HTTP_REFERER'])){
				$this->session->unset_userdata('category');
			}
		}

		$data['title'] = 'whitepaper List';
		$data['menu'] = 'whitepaper';
		$data['content'] = 'webadmin/whitepaper/list';

		$tmpl = array (
			'table_open'          => '<table class="table table-hover table-striped table-bordered table-highlight-head">',
			'table_close'         => '</table>'
			);
		$this->table->set_template($tmpl);
		$this->table->set_heading('#', 'Title', 'Short Content', 'Date', 'Image', 'Content', 'Action');

		$data['page_offset'] = (int)$this->uri->segment(4);
		$config['uri_segment'] = 4;
		$config['per_page'] = '10';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = 'Next → ';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '← Previous';
		$config['prev_tag_open'] = '<li class="revious">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['base_url'] = base_url().'webadmin/whitepaper/data';
		$data['total_rows'] = $config['total_rows'] = $this->whitepaper_model->getListCount();
		
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		// $data['category'] = $this->whitepaper_model->getCategory();

		$data['list'] = $this->whitepaper_model->getList($config['per_page'], $data['page_offset']);

		$this->load->view('webadmin/template', $data);
	}

	function add(){

		$data['content'] = 'webadmin/whitepaper/add';	
		$data['title'] = 'Add whitepaper';
		$data['menu'] = 'whitepaper';
		// $data['category'] = $this->whitepaper_model->getCategory();
		// $data = '';

		$this->load->view('webadmin/template', $data);
	}

	function edit($whitepaper_id = 0){
		$data['content'] = 'webadmin/whitepaper/edit';
		$data['title'] = 'Edit whitepaper';
		$data['menu'] = 'whitepaper';
		// $data['category'] = $this->whitepaper_model->getCategory();
		$data['row'] = $this->whitepaper_model->getwhitepaper($whitepaper_id);

		$this->load->view('webadmin/template', $data);
	}

	function submit(){
		if($this->whitepaper_model->insert()){
			$this->session->set_flashdata('done', 'has been successfully added.');
			redirect('webadmin/whitepaper/data');
		}
	}

	function update(){
		if($this->whitepaper_model->update()){
			$this->session->set_flashdata('done', 'has been Updated.');
			redirect('webadmin/whitepaper/data');
		}
	}

	function delete($id){
		$path = './uploads/whitepaper/';
		
		$dt = $this->db->get_where('site_whitepaper', array('id'=>$id));
		$pict = $dt->row()->picture;

		unlink($path.$pict); //delete pict
		unlink($path.'thumbs/'.$pict); //delete thumbs pict
		if($this->db->delete('site_whitepaper', array('id'=>$id))){
			$this->session->set_flashdata('warning', 'has been deleted.');
			redirect('webadmin/whitepaper/data');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */