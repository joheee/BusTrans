<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondektur_model extends CI_Model {
	private $table = 'kondektur';

	// mengambil seluruh data dari table kondektur
	public function getAll(){
		$this->db
		->select('*')
		->from($this->table)
		->join('trans_upn', $this->table.'.id_kondektur = trans_upn.id_kondektur')
		->group_by($this->table.'.id_kondektur')
		->order_by($this->table.'.id_kondektur','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data berdasarkan id dari table kondektur
	public function getById($id_kondektur) {
        return $this->db->get_where($this->table, ["id_kondektur" => $id_kondektur])->row();
	}

	// menghapus data berdasarkan id dari table kondektur
	public function delete($id_kondektur){
		return $this->db->delete($this->table, array('id_kondektur' => $id_kondektur));
	}

	// memasukkan data baru ke table kondektur
	public function save(){
		$data = array(
			'nama' => $this->input->post('KondekturName'),
		);
		return $this->db->insert($this->table, $data);
	}

	// update data berdasarkan id ke table kondektur
	public function edit(){
		$data = array(
			'nama' => $this->input->post('KondekturName'),
		);
		$id_kondektur = $this->uri->segment(3);
		var_dump($id_kondektur);
        return $this->db->update($this->table, $data, array('id_kondektur' => $id_kondektur));
	}

	// mengambil seluruh kalkulasi income dari gabungan table kondektur dan trans_upn
	public function getAllIncome($id_kondektur){
		$stringQuery = 'select t.jumlah_km * 1500 as `total_harga`, t.jumlah_km, t.tanggal, d.id_kondektur from kondektur d join trans_upn t on d.id_kondektur = t.id_kondektur where d.id_kondektur = ?';
		$query = $this->db->query($stringQuery, array($id_kondektur));
		return $query->result();
	}

	// filter kalkulasi income berdasarkan income dari gabungan table kondektur dan trans_upn
	public function filterByMonth(){
		$id_kondektur = $this->uri->segment(3);
		$month = $this->input->post('filterMonth');

		$stringQuery = 'select t.jumlah_km * 1500 as `total_harga`, t.jumlah_km, t.tanggal, d.id_kondektur from kondektur d join trans_upn t on d.id_kondektur = t.id_kondektur where d.id_kondektur = ?  and month(t.tanggal) = ?';
		$query = $this->db->query($stringQuery, array($id_kondektur, $month));
		return $query->result();
	}
}
