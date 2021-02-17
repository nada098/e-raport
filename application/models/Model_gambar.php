<?php
class Model_gambar extends CI_Model {
	function __construct(){
		parent:: __construct();
	}
	function getAll(){
$data = $this->db->query("SELECT tb_siswa.*, tb_gambar.id_gambar AS id_gambar, tb_gambar.nis AS nis, tb_gambar.foto AS foto, tb_gambar.aktif AS aktif FROM tb_gambar LEFT JOIN tb_siswa ON tb_gambar.nis ORDER BY tb_gambar.id_gambar DESC ");
return $data;
	}
	function getByID($id_gambar){
		$data = $this->db->where('id_gambar',$id_gambar);
		$data = $this->db->get('tb_gambar');
		return $data;
	}
	function simpan($id_gambar,$nis,$foto,$aktif){
		$data=array(
			'id_gambar'=>$id_gambar,
			'nis'=>$nis,
			'foto'=>$foto,
			'aktif'=>$aktif
		);
		$this->db->insert('tb_gambar',$data);
	}
	function ubah($id_gambar,$nis,$foto,$aktif){
		$data=array(
			'nis'=>$nis,
			'foto'=>$foto,
			'aktif'=>$aktif
		);
		$this->db->where('id_gambar',$id_gambar);
		$this->db->update('tb_gambar',$data);
	}
	function hapus($id_gambar){
		$data=$this->db->where('id_gambar',$id_gambar);
		$data=$this->db->delete('tb_gambar');
		if($id_gambar){
			return TRUE;
		}else {
			return FALSE;
		}

	}
	function maxdata(){
		$data = $this->db->select_max('id_gambar','lastid');
		$data = $this->db->get('tb_gambar');
		return $data;
	}
}