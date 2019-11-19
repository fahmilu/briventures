<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {
        function __construct()
	{
		parent::__construct();
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		$this->load->model('banner_model');
	}
	
       
	public function index()
	{
	     redirect('webadmin/banner/data');
	}

	function data(){
		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
        $this->output->set_header('Pragma: no-cache');
		$data['title'] = 'Banner List';
		$data['menu'] = 'banner';
		$data['content'] = 'webadmin/banner/list';

		$this->load->view('webadmin/template', $data);
	}

	function edit($banner_id = 0){
		$data['content'] = 'webadmin/banner/edit';
		$data['title'] = 'EDIT BANNER';
		$data['menu'] = 'banner';
		// $data['category'] = $this->banner_model->getCategory();
		// $data['row'] = $this->banner_model->getbanner($banner_id);
		$data['id'] = $banner_id;

		$this->load->view('webadmin/template', $data);
	}

	function submit(){
		if($this->banner_model->insert()){
			$this->session->set_flashdata('done', 'has been successfully added.');
			redirect('webadmin/banner/data');
		}
	}

	function update(){
		if($this->banner_model->update()){
			$this->session->set_flashdata('done', 'has been Updated.');
			redirect('webadmin/banner/data');
		}
	}

	function delete($id){
		$path = './uploads/banner/';
		
		$dt = $this->db->get_where('site_banner', array('id'=>$id));
		$pict = $dt->row()->banner;

		unlink($path.$pict); //delete pict
		unlink($path.'thumbs/'.$pict); //delete thumbs pict
		if($this->db->delete('site_banner', array('id'=>$id))){
			$this->session->set_flashdata('warning', 'has been deleted.');
			redirect('webadmin/banner/data');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */