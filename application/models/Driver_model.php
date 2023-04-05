<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver_model extends CI_Model {
	private $table = 'driver';

	// mengambil seluruh data dari table driver
	public function getAll() {
		$this->db
			->select('*')
			->from($this->table)
			->join('trans_upn', $this->table.'.id_driver = trans_upn.id_driver')
			->group_by($this->table.'.id_driver')
			->order_by($this->table.'.id_driver','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// menghapus data berdasarkan id dari table driver
	public function delete($id_driver){
		return $this->db->delete($this->table, array('id_driver' => $id_driver));
	}

	// memasukkan data baru ke table driver
	public function save(){
		$data = array(
			'nama' => $this->input->post('DriverName'),
			'no_sim' => $this->input->post('DriverNumber'),
			'alamat' => $this->input->post('DriverAddress'),
		);
		return $this->db->insert($this->table, $data);
	}

	// mengambil data berdasarkan id dari table driver
	public function getById($id_driver) {
        return $this->db->get_where($this->table, ["id_driver" => $id_driver])->row();
	}

	// update data berdasarkan id ke table driver
	public function edit(){
		$data = array(
			'nama' => $this->input->post('DriverName'),
			'no_sim' => $this->input->post('DriverNumber'),
			'alamat' => $this->input->post('DriverAddress'),
		);
		$id_driver = $this->uri->segment(3);
		var_dump($id_driver);
        return $this->db->update($this->table, $data, array('id_driver' => $id_driver));
	}

	// mengambil seluruh kalkulasi income dari gabungan table driver dan trans_upn
	public function getAllIncome($id_driver){
		$stringQuery = 'select t.jumlah_km * 3000 as `total_harga`, t.jumlah_km, t.tanggal, d.id_driver from driver d join trans_upn t on d.id_driver = t.id_driver where d.id_driver = ?';
		$query = $this->db->query($stringQuery, array($id_driver));
		return $query->result();
	}

	// filter kalkulasi income berdasarkan income dari gabungan table driver dan trans_upn
	public function filterByMonth(){
		$id_driver = $this->uri->segment(3);
		$month = $this->input->post('filterMonth');

		$stringQuery = 'select t.jumlah_km * 3000 as `total_harga`, t.jumlah_km, t.tanggal, d.id_driver from driver d join trans_upn t on d.id_driver = t.id_driver where d.id_driver = ?  and month(t.tanggal) = ?';
		$query = $this->db->query($stringQuery, array($id_driver, $month));
		return $query->result();
	}
}
