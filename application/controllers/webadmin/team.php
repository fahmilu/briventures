<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {
        function __construct()
	{
		parent::__construct();
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		$this->load->model('team_model');
	}
	
       
	public function index($category="keyteam")
	{	

		// $this->session->set_userdata('team_category', $category);
	    
	    redirect('webadmin/team/data');

	}

	function data(){
		// print_r($this->session->all_userdata());

		// exit();
		// if(isset($_SERVER['HTTP_REFERER'])){
		// 	if(!preg_match("/team/",$_SERVER['HTTP_REFERER'])){
		// 		$this->session->unset_userdata('team_category');
		// 	}
		// }

		$data['title'] = 'Team List';
		$data['menu'] = 'team';
		$data['content'] = 'webadmin/team/list';

		$tmpl = array (
			'table_open'          => '<table class="table table-hover table-striped table-bordered table-highlight-head">',
			'table_close'         => '</table>'
			);
		$this->table->set_template($tmpl);
		$this->table->set_heading('#', 'Title', 'Position', 'Photo', 'Social Media', 'Description', 'Action');

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
		$config['base_url'] = base_url().'webadmin/team/data';
		$data['total_rows'] = $config['total_rows'] = $this->team_model->getListCount();
		
		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();
		// $data['category'] = $this->team_model->getCategory();

		$data['list'] = $this->team_model->getList($config['per_page'], $data['page_offset']);

		$this->load->view('webadmin/template', $data);
	}

	function edit_position(){	


		$data['title'] = 'Team List';
		$data['menu'] = 'team';
		$data['content'] = 'webadmin/team/sort';

		$data['list'] = $this->team_model->getAllteam();

		$this->load->view('webadmin/template', $data);
	}

	function update_position(){
		if($this->team_model->update_position()){
			$this->session->set_flashdata('done', ' position has been Updated.');
			redirect('webadmin/team/data');
		}
	}

	function add(){

		$data['content'] = 'webadmin/team/add';	
		$data['title'] = 'Add Team';
		$data['menu'] = 'team';


		$this->load->view('webadmin/template', $data);
	}

	function edit($team_id = 0){
		$data['content'] = 'webadmin/team/edit';
		$data['title'] = 'Edit Team';
		$data['menu'] = 'team';
		$data['row'] = $this->team_model->getteam($team_id);

		$this->load->view('webadmin/template', $data);
	}

	function submit(){
		if($this->team_model->insert()){
			$this->session->set_flashdata('done', 'has been successfully added.');
			redirect('webadmin/team/data');
		}
	}

	function update(){
		if($this->team_model->update()){
			$this->session->set_flashdata('done', 'has been Updated.');
			redirect('webadmin/team/data');
		}
	}

	function delete($id){
		$path = './uploads/team/';
		
		$dt = $this->db->get_where('site_team', array('id'=>$id));
		$pict = $dt->row()->picture;

		unlink($path.$pict); //delete pict
		unlink($path.'thumbs/'.$pict); //delete thumbs pict
		if($this->db->delete('site_team', array('id'=>$id))){
			$this->session->set_flashdata('warning', 'has been deleted.');
			redirect('webadmin/team/data');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */