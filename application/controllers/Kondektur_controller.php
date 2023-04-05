<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondektur_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kondektur_model');
	}

	// method ini untuk mengambil semua data dari Kondektur_model
	public function index() {
		$data['data_kondektur'] = $this->Kondektur_model->getAll();
		$this->load->view('kondektur/kondektur_index', $data);
	}
	
	// method ini untuk membuka view form tempat insert kondektur
	public function insert() {
		$this->load->view('kondektur/kondektur_insert');
	}
	
	// method ini untuk menghapus data Kondektur_model
	public function delete() {
		$id_kondektur = $this->uri->segment(3);
		$this->Kondektur_model->delete($id_kondektur);
		redirect($_SERVER['HTTP_REFERER']);
	}

	// method ini untuk menambahkan data ke dalam Kondektur_model
	public function save() {
		$this->Kondektur_model->save($this->input->post());
		redirect('Kondektur_controller/index');
	}

	// method ini untuk membuka view form tempat update kondektur
	public function update() {
		$id_kondektur = $this->uri->segment(3);
		$data['current_kondektur'] = $this->Kondektur_model->getById($id_kondektur);
		$this->load->view('kondektur/kondektur_update', $data);
	}	

	// method ini untuk melakukan proses update data Kondektur_model
	public function edit() {
		$this->Kondektur_model->edit($this->input->post());
		redirect('Kondektur_controller/index');
	}

	// mengambil seluruh income kondektur
	public function income() {
		$id_kondektur = $this->uri->segment(3);
		$data['id_kondektur'] = $id_kondektur;
		$data['kondektur_income'] = $this->Kondektur_model->getAllIncome($id_kondektur);
		$this->load->view('kondektur/kondektur_income', $data);
	}

	// filter income kondektur by month
	public function filterByMonth() {
		$id_kondektur = $this->uri->segment(3);
		$data['id_kondektur'] = $id_kondektur;
		$data['kondektur_income'] = $this->Kondektur_model->filterByMonth($this->input->post());
		if(count($data['kondektur_income']) > 0){
			$this->load->view('kondektur/kondektur_income', $data);
		} else {
		$data['kondektur_income'] = $this->Kondektur_model->getAllIncome($id_kondektur);
			$this->load->view('kondektur/kondektur_income', $data);
		}
	}
}
