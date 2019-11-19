<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {
        function __construct()
	{
		parent::__construct();
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		$this->load->model('portfolio_model');
	}
	
       
	public function index($category='investment')
	{	
		// $this->session->set_userdata('pt_category', $category);

	    redirect('webadmin/portfolio/data');
	}

	function data(){
		// if(isset($_SERVER['HTTP_REFERER'])){
		// 	if(!preg_match("/portfolio/",$_SERVER['HTTP_REFERER'])){
		// 		$this->session->unset_userdata('pt_category');
		// 	}
		// }

		$data['title'] = 'Portfolio List';
		$data['menu'] = 'portfolio';
		$data['content'] = 'webadmin/portfolio/list';

		$tmpl = array (
			'table_open'          => '<table class="table table-hover table-striped table-bordered table-highlight-head">',
			'table_close'         => '</table>'
			);
		$this->table->set_template($tmpl);
		$this->table->set_heading('#', 'Title', 'Logo', 'Positioning', 'Social Media', 'Description', 'Action');

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
		$config['base_url'] = base_url().'webadmin/portfolio/data';
		$data['total_rows'] = $config['total_rows'] = $this->portfolio_model->getListCount();
		
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		// $data['category'] = $this->portfolio_model->getCategory();

		$data['list'] = $this->portfolio_model->getList($config['per_page'], $data['page_offset']);

		$this->load->view('webadmin/template', $data);
	}

	function edit_position(){	


		$data['title'] = 'Portfolio List';
		$data['menu'] = 'portfolio';
		$data['content'] = 'webadmin/portfolio/sort';

		$data['list'] = $this->portfolio_model->getAllportfolio();

		$this->load->view('webadmin/template', $data);
	}

	function update_position(){
		if($this->portfolio_model->update_position()){
			$this->session->set_flashdata('done', ' position has been Updated.');
			redirect('webadmin/portfolio/data');
		}
	}

	function add(){

		$data['content'] = 'webadmin/portfolio/add';	
		$data['title'] = 'Add Portfolio';
		$data['menu'] = 'portfolio';
		// $data['tag'] = $this->portfolio_model->getTag();

		// print_r($data['tag']);
		$this->load->view('webadmin/template', $data);
	}

	function edit($portfolio_id = 0){
		$data['content'] = 'webadmin/portfolio/edit';
		$data['title'] = 'Edit Portfolio';
		$data['menu'] = 'portfolio';
		// $data['tag'] = $this->portfolio_model->getTag();
		$data['row'] = $this->portfolio_model->getportfolio($portfolio_id);

		// $data['tags'] = '';
		// if($data['row']->tag){
		// 	$tg = $data['row']->tag;
		// 	$tg = explode(', ', $tg);

		// 	foreach ($tg as $key => $value) {
		// 		$data['tags'].= "'$value', ";
		// 	}
		// }

		$this->load->view('webadmin/template', $data);
	}

	function submit(){
		if($this->portfolio_model->insert()){
			$this->session->set_flashdata('done', 'has been successfully added.');
			redirect('webadmin/portfolio/data');
		}
	}

	function update(){
		if($this->portfolio_model->update()){
			$this->session->set_flashdata('done', 'has been Updated.');
			redirect('webadmin/portfolio/data');
		}
	}

	function delete($id){
		$path = './uploads/portfolio/';
		
		$dt = $this->db->get_where('site_portfolio', array('id'=>$id));
		$pict = $dt->row()->picture;

		unlink($path.$pict); //delete pict
		unlink($path.'thumbs/'.$pict); //delete thumbs pict
		if($this->db->delete('site_portfolio', array('id'=>$id))){
			$this->session->set_flashdata('warning', 'has been deleted.');
			redirect('webadmin/portfolio/data');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */