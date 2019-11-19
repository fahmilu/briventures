<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model
{
	private $table	= 'site_banner';				

	function __construct()
	{
		parent::__construct();
		$ci =& get_instance();
	}

// fungsi untuk bagian admin
	public function getListCount(){
		$q = $this->db->get_where($this->table);
		return $q->num_rows();
	}		

	function getBannerPage($category_id){
		return $this->db->get_where($this->table,  array('cat_id' => $category_id));	
	}

	function getBannerByCategory($category){
		$this->db->like('category', $category);
		$dt = $this->db->get($this->table.'_category');
		$category_id = $dt->row()->id;
		$dt = $this->db->get_where($this->table,  array('cat_id' => $category_id));	
		if($dt->num_rows() != 0){
			return base_url('uploads/banner/'.$dt->row()->banner);
		}else{
			return '0';
		}
	}

	public function getBanner($id){
		$q = $this->db->get_where($this->table,  array('id' => $id));
		return $q->row();
	}	

	public function getList($per_page, $page_offset){
		$this->db->select('site_banner.*');
		$this->db->from('site_banner');
		// $this->db->join('site_banner_category', 'site_banner_category.id = site_banner.cat_id', 'left');
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('site_banner.cat_id', 'asc');
		return $this->db->get();
	}

	public function getAllList(){
		$this->db->select('site_banner.*');
		$this->db->from('site_banner');
		return $this->db->get();
	}


	function insert(){
		$datestring = "%Y-%m-%d %H:%i:%s";
		$time = time();
		
		$this->load->library('upload');	
		$configs['upload_path'] = './uploads/banner/';
		$configs['allowed_types'] = 'gif|jpg|png';
		$configs['max_size']    = '2048';
		$config['max_width'] = '2048';
		$config['max_height'] = '2048';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "banner_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/banner/'.$data['file_name'];
				$new_thumb='./uploads/banner/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path, 250, 250, 'auto');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/banner/add/');
			}
		}else{
				$this->session->set_flashdata('error', 'upload banner error');
				redirect('webadmin/banner/add/');
		}
		
		if($c1 != null){
			$insertdb = array(       
				'title' => $this->input->post('name'),
				'link' => $this->input->post('link'),
				'banner' => $c1name
			); 

			$insert = $this->db->insert($this->table, $insertdb);
		}
		
		
		return $insert;
		
	}

	function update(){
		// print_r($_POST);
		// exit();
		$datestring = "%Y-%m-%d %H:%i:%s";
		$time = time();
		$id = $_POST['id'];
		
		$this->load->library('upload');	
		$path = $configs['upload_path'] = './uploads/';
		$configs['allowed_types'] = 'jpg';
		$configs['max_size']    = '2048';
		$config['max_width'] = '2048';
		$config['max_height'] = '2048';
		$config['overwrite'] = true;
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			// $configs['file_name']    = "banner".$this->input->post('id');
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				// $img_path='./uploads/banner/'.$data['file_name'];
				// $new_thumb='./uploads/banner/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				// $this->load->library('image_resize');
				// $resizeObj = new Image_resize();
				// $resizeObj->resizeImage($img_path,250, 250, 'auto');
				// $resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/banner/edit/'.$this->input->post('id'));
			}
		}

		// $updatedb = array(       
		// 	'title' => $this->input->post('name'),
		// 	'link' => $this->input->post('link')
		// ); 	
		// echo $c1name;
		if($c1 != null){

			unlink($path.'banner'.$this->input->post('id').'.jpg');
			rename($path.$c1name, $path.'banner'.$this->input->post('id').'.jpg'); 
			// $updatedb['banner'] = $c1name;
		}
		// exit();
		// $this->db->where('id', $id);
		// $update = $this->db->update($this->table, $updatedb);
		return true;
	}

}