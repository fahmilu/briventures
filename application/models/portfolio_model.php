<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio_model extends CI_Model
{
	private $table	= 'site_portfolio';				

	function __construct()
	{
		parent::__construct();
		$ci =& get_instance();
	}

// fungsi untuk bagian admin
	public function getListCount(){
		// if($category = $this->session->userdata('pt_category')){
		// 	$this->db->where('category', $category);
		// }
		$q = $this->db->get($this->table);
		return $q->num_rows();
	}			

	public function getportfolio($id){
		$q = $this->db->get_where($this->table, array('id' => $id));
		return $q->row();
	}	

	public function getList($per_page, $page_offset){
		// if($category = $this->session->userdata('pt_category')){
		// 	$this->db->like('category', $category);
		// }
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('position', 'asc');
		return $this->db->get($this->table);
	}

	public function getList_($per_page, $page_offset){
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('category', 'desc');
		$this->db->order_by('position', 'asc');
		return $this->db->get($this->table);
	}

	public function getListRand($per_page, $page_offset){
		// if($category = $this->session->userdata('pt_category')){
		// 	$this->db->like('category', $category);
		// }
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('id', 'RANDOM');
		return $this->db->get($this->table);
	}

	public function getTag(){
		$dt = $this->db->get($this->table);
		$tag = array();
		foreach ($dt->result() as $row) {
			if($row->tag){			
				$tg = $row->tag;
				$tg = explode(', ', $tg);
				foreach ($tg as $key => $value) {
					if(!in_array($value, $tag)){
						array_push($tag, $value);
					}
				}
			}
		}
		asort($tag);
		return $tag;
	}

	public function getAllportfolio(){
		// if($category = $this->session->userdata('pt_category')){
		// 	$this->db->like('category', $category);
		// }
		$this->db->order_by('position', 'asc');
		return $this->db->get($this->table);
	}

	public function getAllportfolioByCat($category){
		$this->db->where('category', $category);
		$this->db->order_by('position', 'asc');
		return $this->db->get($this->table);
	}

	public function getAllportfoliobyTag($tag){
		$this->db->like('tag', $tag);
		$this->db->order_by('position', 'asc');
		return $this->db->get($this->table);
	}

	public function getListByCat($per_page, $page_offset, $category){
		$this->db->where('category', $category);
		$this->db->limit($per_page,$page_offset);
		$this->db->order_by('position', 'asc');
		return $this->db->get($this->table);
	}	

	public function getFullportfolio($id){
		$this->db->where('id', $id);
		$dt = $this->db->get($this->table);
		return $dt->row();
	}

	function CheckPortfolioExist($id){
		$this->db->where('id', $id);
		$dt = $this->db->get($this->table);
		if($dt->num_rows() == 0){
			return false;
		}else{
			return true;
		}	
	}
	function insert(){
		$datestring = "%Y-%m-%d %H:%i:%s";
		$time = time();
		
		$this->load->library('upload');	
		$configs['upload_path'] = './uploads/portfolio/';
		$configs['allowed_types'] = 'gif|jpg|png|jpeg';
		$configs['max_size']    = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '1024';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "portfolio_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/portfolio/'.$data['file_name'];
				$new_thumb='./uploads/portfolio/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path, 109, 170, 'landscape');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/portfolio/add/');
			}
		}else{
				$this->session->set_flashdata('error', 'upload about error');
				redirect('webadmin/portfolio/add/');
		}
		
		// $tag = $this->input->post('tag');
		// $tag = json_decode($tag);
		if($c1 != null){
			$insertdb = array(       
				'name' => $this->input->post('name'),
				'category' => $this->session->userdata('pt_category'),
				'positioning' => $this->input->post('positioning'),
				'mail' => $this->input->post('mail'),
				'twitter' => $this->input->post('twitter'),
				'facebook' => $this->input->post('facebook'),
				'linkedin' => $this->input->post('linkedin'),
				'instagram' => $this->input->post('instagram'),
				'url' => $this->input->post('url'),
				'listed' => $this->input->post('listed'),
				'listed_by' => $this->input->post('listed_by'),
				'description' => $this->input->post('description'),
				// 'tag' => implode(', ', $tag),
				'picture' => $c1name
			); 

			$insert = $this->db->insert($this->table, $insertdb);
			$id = $this->db->insert_id();

			$this->db->where('id', $id);
			$this->db->update($this->table, array('position'=>$id));
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
		$configs['upload_path'] = './uploads/portfolio/';
		$configs['allowed_types'] = 'gif|jpg|png|jpeg';
		$configs['max_size']    = '1024';
		$config['max_width'] = '800';
		$config['max_height'] = '800';
		
		$c1 = null;
		$insert = null;
		// print_r()
		if(!empty($_FILES['userfile']['tmp_name']) && $_FILES['userfile']['tmp_name'] != 'none'){		

			$configs['file_name']    = "portfolio_".date("Y-m-d_His", time());
			$this->upload->initialize($configs);
		
			if ($this->upload->do_upload('userfile')){
				
				$data = $this->upload->data();
				$img_path='./uploads/portfolio/'.$data['file_name'];
				$new_thumb='./uploads/portfolio/thumbs/'.$data['raw_name'].$data['file_ext'];
				
				$this->load->library('image_resize');
				$resizeObj = new Image_resize();
				$resizeObj->resizeImage($img_path, 109, 170, 'landscape');
				$resizeObj->saveImage($new_thumb, 100);

				$c1name = $data['raw_name'].$data['file_ext'];

				$c1 = 1;
				
			}else{
	
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('webadmin/portfolio/edit/'.$id);
			}
		}
		// $tag = $this->input->post('tag');
		// $tag = json_decode($tag);
		$updatedb = array(       
				'name' => $this->input->post('name'),
				'category' => $this->session->userdata('pt_category'),
				'positioning' => $this->input->post('positioning'),
				'mail' => $this->input->post('mail'),
				'twitter' => $this->input->post('twitter'),
				'facebook' => $this->input->post('facebook'),
				'linkedin' => $this->input->post('linkedin'),
				'instagram' => $this->input->post('instagram'),
				'listed' => $this->input->post('listed'),
				'listed_by' => $this->input->post('listed_by'),
				// 'tag' => implode(', ', $tag),
				'url' => $this->input->post('url'),
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

	function update_position(){
		$pos = $this->input->post('position');
		$pos = explode(',', $pos);
		$i = 1;
		foreach ($pos as $key => $id) {
			$updatedb = array('position'=>$i);
			$this->db->where('id', $id);

			$update = $this->db->update($this->table, $updatedb);
			$i++;
		}

		return true;
	}

}