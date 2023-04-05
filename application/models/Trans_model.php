<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trans_model extends CI_Model {
	private $table = 'trans_upn';
	
	// mengambil seluruh data dari table trans_upn
	public function getAll(){
		$this->db->select('*')->from($this->table)->order_by('id_trans_upn','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data berdasarkan id dari table trans_upn
	public function getById($id_trans_upn) {
        return $this->db->get_where($this->table, ["id_trans_upn" => $id_trans_upn])->row();
	}

	// menghapus data berdasarkan id dari table trans_upn
	public function delete($id_trans_upn){
		return $this->db->delete($this->table, array('id_trans_upn' => $id_trans_upn));
	}
	
	// memasukkan data baru ke table trans_upn
	public function save(){
		$data = array(
			'id_kondektur' => $this->input->post('idKondektur'),
			'id_bus' => $this->input->post('idBus'),
			'id_driver' => $this->input->post('idDriver'),
			'jumlah_km' => $this->input->post('jumlahKm'),
			'tanggal' => $this->input->post('tanggal'),
		);
		return $this->db->insert($this->table, $data);
	}

	// update data berdasarkan id ke table trans_upn
	public function edit(){
		$data = array(
			'id_kondektur' => $this->input->post('idKondektur'),
			'id_bus' => $this->input->post('idBus'),
			'id_driver' => $this->input->post('idDriver'),
			'jumlah_km' => $this->input->post('jumlahKm'),
			'tanggal' => $this->input->post('tanggal'),
		);
		$id_trans_upn = $this->uri->segment(3);
		var_dump($id_trans_upn);
        return $this->db->update($this->table, $data, array('id_trans_upn' => $id_trans_upn));
	}
}
