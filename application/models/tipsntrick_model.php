<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tipsntrick_model extends CI_Model
{
	private $table	= 'tipsntrick';				

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

	public function gettipsntrick($id){
		$q = $this->db->get_where($this->table, array('id' => $id));
		return $q->row();
	}
	
	public function getNextTips($id){
		$this->db->where('id >', $id);
		$this->db->limit(1);
		$this->db->order_by('date', 'desc');
		$q = $this->db->get($this->table);
		return $q;
	}	

	public function getPrevTips($id){
		$this->db->where('id <', $id);
		$this->db->limit(1);
		$this->db->order_by('date', 'desc');
		$q = $this->db->get($this->table);
		return $q;
	}	

	public function getList($per_page, $page_offset){
		if($category = $this->session->userdata('category')){
			$this->db->like('category', $category);
		}
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('date', 'desc');
		return $this->db->get($this->table);
	}

	public function getAlltipsntrick(){
		$this->db->order_by('date', 'desc');
		return $this->db->get($this->table);
	}

	public function getListByCat($per_page, $page_offset, $category){
		$this->db->where('category', $category);
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('date', 'desc');
		return $this->db->get($this->table);
	}	

	public function getFulltipsntrick($id){
		$this->db->where('id', $id);
		$dt = $this->db->get($this->table);
		return $dt->row();
	}

	function insert(){
		$datestring = "%Y-%m-%d %H:%i:%s";
		$time = time();
		
		$this->load->library('upload');	
		$configs['upload_path'] = './uploads/tipsntrick/';
		$configs['allowed_types'] = 'gif|jpg|png|jpeg';
		$configs['max_size']    = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '1024';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "tipsntrick_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/tipsntrick/'.$data['file_name'];
				$new_thumb='./uploads/tipsntrick/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path,309, 126, 'crop');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/tipsntrick/add/');
			}
		}else{
				$this->session->set_flashdata('error', 'upload about error');
				redirect('webadmin/tipsntrick/add/');
		}
		
		if($c1 != null){
			$date = strtotime($this->input->post('date'));
			$insertdb = array(       
				'title_id' => $this->input->post('title_id'),
				'title_en' => $this->input->post('title_en'),
				'date' => date('Y-m-d', $date),
				'description_id' => $this->input->post('description_id'),
				'description_en' => $this->input->post('description_en'),
				'picture' => $c1name
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
		$configs['upload_path'] = './uploads/tipsntrick/';
		$configs['allowed_types'] = 'gif|jpg|png|jpeg';
		$configs['max_size']    = '1024';
		$config['max_width'] = '800';
		$config['max_height'] = '800';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "tipsntrick_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/tipsntrick/'.$data['file_name'];
				$new_thumb='./uploads/tipsntrick/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path,309, 126, 'crop');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/tipsntrick/edit/'.$id);
			}
		}
		$date = strtotime($this->input->post('date'));
		$updatedb = array(       
			'title_id' => $this->input->post('title_id'),
			'title_en' => $this->input->post('title_en'),
			'date' => date('Y-m-d', $date),
			'description_id' => $this->input->post('description_id'),
			'description_en' => $this->input->post('description_en'),
		); 	

		if($c1 != null){
			$path = $configs['upload_path'];
			$dt = $this->db->get_where($this->table, array('id'=>$id));
			$pict = $dt->row()->picture;

			unlink($path.$pict); //delete pict
			unlink($path.'thumbs/'.$pict); //delete thumbs pict
			$updatedb['picture'] = $c1name;
		}

		$this->db->where('id', $id);
		$update = $this->db->update($this->table, $updatedb);

		return $update;
		
	}

	// function update_position(){
	// 	$pos = $this->input->post('position');
	// 	$pos = explode(',', $pos);
	// 	$i = 1;
	// 	foreach ($pos as $key => $id) {
	// 		$updatedb = array('position'=>$i);
	// 		$this->db->where('id', $id);

	// 		$update = $this->db->update($this->table, $updatedb);
	// 		$i++;
	// 	}

	// 	return true;
	// }

}