<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bus_model extends CI_Model {
	private $table = 'bus';
	
	// mengambil seluruh data dari table bus
	public function getAll() {
		$this->db
			->select('*')->from($this->table)
			->join('trans_upn', $this->table.'.id_bus = trans_upn.id_bus')
			->group_by($this->table.'.id_bus')
			->order_by($this->table.'.id_bus','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data berdasarkan status dari table bus
	public function getByStatus($status){
		$this->db
			->select('*')->from($this->table)
			->join('trans_upn', $this->table.'.id_bus = trans_upn.id_bus')
			->where('status',$status)
			->group_by($this->table.'.id_bus')
			->order_by($this->table.'.id_bus','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data berdasarkan id dari table bus
	public function getById($id_bus) {
        return $this->db->get_where($this->table, ["id_bus" => $id_bus])->row();
	}

	// menghapus data berdasarkan id dari table bus
	public function delete($id_bus){
		return $this->db->delete($this->table, array('id_bus' => $id_bus));
	}
	
	// memasukkan data baru ke table bus
	public function save(){
		$data = array(
			'plat' => $this->input->post('BusPlat'),
			'status' => $this->input->post('BusStatus'),
		);
		return $this->db->insert($this->table, $data);
	}

	// update data berdasarkan id ke table bus
	public function edit(){
		$data = array(
			'plat' => $this->input->post('BusPlat'),
			'status' => $this->input->post('BusStatus'),
		);
		$id_bus = $this->uri->segment(3);
		var_dump($id_bus);
        return $this->db->update($this->table, $data, array('id_bus' => $id_bus));
	}
}
