<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
	private $table	= 'gallery';				

	function __construct()
	{
		parent::__construct();
		$ci =& get_instance();
	}

// fungsi untuk bagian admin
	public function getListCount(){
		if($category = $this->session->userdata('category')){
			$this->db->where('category', $category);
		}
		$q = $this->db->get($this->table);
		return $q->num_rows();
	}	

	public function getListCountByCat($category){
		$this->db->where('category', $category);
		$q = $this->db->get($this->table);
		return $q->num_rows();
	}		

	public function getgallery($id){
		$q = $this->db->get_where($this->table, array('id' => $id));
		return $q->row();
	}	

	public function getList($per_page, $page_offset){
		$this->db->select('gallery.*');
		// $this->db->join('gallery_category', 'gallery_category.id = gallery.category', 'left');
		if($category = $this->session->userdata('category')){
			$this->db->like('category', $category);
		}
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('timestamp', 'desc');
		return $this->db->get($this->table);
	}

	public function getListRand($per_page, $page_offset){
		$this->db->select('gallery.*');
		// $this->db->join('gallery_category', 'gallery_category.id = gallery.category', 'left');
		if($category = $this->session->userdata('category')){
			$this->db->like('category', $category);
		}
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('timestamp', 'RANDOM');
		return $this->db->get($this->table);
	}

	public function getAllgallery(){
		$this->db->order_by('timestamp', 'desc');
		return $this->db->get($this->table);
	}

	public function getListByCat($per_page, $page_offset, $category){
		$this->db->where('category', $category);
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('timestamp', 'desc');
		return $this->db->get($this->table);
	}	

	public function getFullgallery($id){
		$this->db->where('id', $id);
		$dt = $this->db->get($this->table);
		return $dt->row();
	}

	function insert(){
		$datestring = "%Y-%m-%d %H:%i:%s";
		$time = time();
		
		$this->load->library('upload');	
		$configs['upload_path'] = './uploads/gallery/';
		$configs['allowed_types'] = 'gif|jpg|png|jpeg';
		$configs['max_size']    = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '1024';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "gallery_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/gallery/'.$data['file_name'];
				$new_thumb='./uploads/gallery/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path, 309, 209, 'crop');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/gallery/add/');
			}
		}else{
				$this->session->set_flashdata('error', 'upload about error');
				redirect('webadmin/gallery/add/');
		}
		
		if($c1 != null){
			// $date = strtotime($this->input->post('timestamp'));
			$insertdb = array(       
				'title_id' => $this->input->post('title_id'),
				'title_en' => $this->input->post('title_en'),
				'category' => $this->input->post('category'),
				'description_id' => $this->input->post('description_id'),
				'description_en' => $this->input->post('description_en'),
				'thumb' => $c1name
			); 

			if($insertdb['category'] == 'photo'){
				$insertdb['gallery'] = json_encode($this->input->post('image'));
			}else{
				$insertdb['youtube_code'] = $this->input->post('youtube_code');
			}

			$insert = $this->db->insert($this->table, $insertdb);
		}

		return $insert;
		
	}

	function update(){
		$datestring = "%Y-%m-%d %H:%i:%s";
		$time = time();
		$id = $_POST['id'];
		
		$this->load->library('upload');	
		$configs['upload_path'] = './uploads/gallery/';
		$configs['allowed_types'] = 'gif|jpg|png|jpeg';
		$configs['max_size']    = '1024';
		$config['max_width'] = '800';
		$config['max_height'] = '800';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "gallery_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/gallery/'.$data['file_name'];
				$new_thumb='./uploads/gallery/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path, 309, 209, 'crop');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/gallery/edit/'.$id);
			}
		}
		$date = strtotime($this->input->post('timestamp'));
		$updatedb = array(       
			'title_id' => $this->input->post('title_id'),
			'title_en' => $this->input->post('title_en'),
			'category' => $this->input->post('category'),
			'description_id' => $this->input->post('description_id'),
			'description_en' => $this->input->post('description_en'),
		); 	
		
		if($updatedb['category'] == 'photo'){
			$updatedb['gallery'] = json_encode($this->input->post('image'));
		}else{
			$updatedb['youtube_code'] = $this->input->post('youtube_code');
		}

		if($c1 != null){
			$path = $configs['upload_path'];
			$dt = $this->db->get_where($this->table, array('id'=>$id));
			$pict = $dt->row()->thumb;

			unlink($path.$pict); //delete pict
			unlink($path.'thumbs/'.$pict); //delete thumbs pict
			$updatedb['thumb'] = $c1name;
		}

		$this->db->where('id', $id);
		$update = $this->db->update($this->table, $updatedb);

		return $update;
		
	}

}