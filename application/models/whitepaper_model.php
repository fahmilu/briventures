<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Whitepaper_model extends CI_Model
{
	private $table	= 'site_whitepaper';				

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

	public function getwhitepaper($id){
		$q = $this->db->get_where($this->table, array('id' => $id));
		return $q->row();
	}

	function get_archived(){
		return $this->db->query('SELECT YEAR(site_whitepaper.date) AS YEAR, 
                COUNT(*) AS TOTAL 
         FROM site_whitepaper GROUP BY YEAR ORDER BY YEAR DESC');
	}

	public function getList($per_page, $page_offset){
		if($category = $this->session->userdata('category')){
			$this->db->like('category', $category);
		}
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('date', 'desc');
		return $this->db->get($this->table);
	}
	public function getList_archived($year){
		$this->db->where('YEAR(date)', $year);
		// $this->db->limit($per_page,$page_offset);
		$this->db->order_by('date', 'desc');
		return $this->db->get($this->table);
	}

	public function getListRand($per_page, $page_offset){
		if($category = $this->session->userdata('category')){
			$this->db->like('category', $category);
		}
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('date', 'RANDOM');
		return $this->db->get($this->table);
	}

	public function getAllwhitepaper(){
		$this->db->order_by('date', 'desc');
		return $this->db->get($this->table);
	}

	public function getListByCat($per_page, $page_offset, $category){
		$this->db->where('category', $category);
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('date', 'desc');
		return $this->db->get($this->table);
	}	

	public function getFullwhitepaper($id){
		$this->db->where('id', $id);
		$dt = $this->db->get($this->table);
		return $dt->row();
	}

	function insert(){
		$datestring = "%Y-%m-%d %H:%i:%s";
		$time = time();
		
		$this->load->library('upload');	
		$configs['upload_path'] = './uploads/whitepaper/';
		$configs['allowed_types'] = 'gif|jpg|png|jpeg';
		$configs['max_size']    = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '1024';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "whitepaper_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/whitepaper/'.$data['file_name'];
				$new_thumb='./uploads/whitepaper/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path, 230, 170, 'crop');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/whitepaper/add/');
			}
		}else{
				$this->session->set_flashdata('error', 'upload about error');
				redirect('webadmin/whitepaper/add/');
		}
		
		if($c1 != null){
			$date = strtotime($this->input->post('date'));
			$insertdb = array(       
				'title' => $this->input->post('title'),
				'date' => date('Y-m-d', $date),
				'short_desc' => $this->input->post('short_desc'),
				'description' => $this->input->post('description'),
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
		$configs['upload_path'] = './uploads/whitepaper/';
		$configs['allowed_types'] = 'gif|jpg|png|jpeg';
		$configs['max_size']    = '1024';
		$config['max_width'] = '800';
		$config['max_height'] = '800';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "whitepaper_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/whitepaper/'.$data['file_name'];
				$new_thumb='./uploads/whitepaper/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path, 230, 170, 'crop');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/whitepaper/edit/'.$id);
			}
		}
		
		$date = strtotime($this->input->post('date'));
		$updatedb = array(       
				'title' => $this->input->post('title'),
				'date' => date('Y-m-d', $date),
				'short_desc' => $this->input->post('short_desc'),
				'description' => $this->input->post('description'),
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

}