<?php

class M_data_crud extends CI_Model{

	function getData(){
		$query = $this->db->query('select * from blog');
		return $query->result();
	}
  function getDataJoin(){
    $query = $this->db->query('select b.title,b.content_artikel,k.kategori from blog as b left outer join kategori as k on b.id_kategori = k.id_kategori');
    return $query->result();
  }

	 public function upload(){
    $config['upload_path'] = './assets/image/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']  = '2048';
    $config['remove_space'] = TRUE;
  
    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Fungsi untuk menyimpan data ke database
  public function simpandData($upload){
    $data = array(
      'title'=>$this->input->post('judul'),
      'content_artikel'=>$this->input->post('konten'),
      'tgl_posting'=>$this->input->post('tanggal'),
      'Sumber_artikel'=>$this->input->post('sumber'),
      'Jenis_Artikel'=>$this->input->post('jenis'),
        'id_kategori'=>$this->input->post('kategori'),
      'Pengarang_Artikel'=>$this->input->post('pengarang'),
      'images' => $upload['file']['file_name']
    );
    
    $this->db->insert('blog', $data);
  }

  public function getDatadetail($id){

  		$this->db->where('id_blog',$id);
  	return	$this->db->get_where('blog');
  }

  public function getKategori(){
   return $this->db->get("kategori");
  }

  public function deleteData($id){
  	$this->db->where('id_blog',$id);
  	$this->db->delete('blog');
  }

  public function updateData($id,$upload){
    $this->db->where('id_blog',$id);
     $data = array(
      'title'=>$this->input->post('judul'),
      'content_artikel'=>$this->input->post('konten'),
      'tgl_posting'=>$this->input->post('tanggal'),
      'Sumber_artikel'=>$this->input->post('sumber'),
      'Jenis_Artikel'=>$this->input->post('jenis'),
      'Pengarang_Artikel'=>$this->input->post('pengarang'),
        'id_kategori'=>$this->input->post('kategori'),
      'images' => $upload['file']['file_name']
    );
    
    $this->db->update('blog', $data);
  }

  public function updateDataOnly($id){
    $this->db->where('id_blog',$id);
     $data = array(
      'title'=>$this->input->post('judul'),
      'content_artikel'=>$this->input->post('konten'),
      'tgl_posting'=>$this->input->post('tanggal'),
      'Sumber_artikel'=>$this->input->post('sumber'),
      'Jenis_Artikel'=>$this->input->post('jenis'),
      'id_kategori'=>$this->input->post('kategori'),
      'Pengarang_Artikel'=>$this->input->post('pengarang'),
      'images' => $upload['file']['file_name']
    );
    
    $this->db->update('blog', $data);
  }
}
	
