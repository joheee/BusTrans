<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trans_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Trans_model');
	}

	// method ini untuk mengambil semua data dari Trans_model
	public function index(){
		$data['data_trans'] = $this->Trans_model->getAll();
		$this->load->view('/trans/trans_index', $data);
	}

	// method ini untuk membuka view form tempat insert trans
	public function insert() {
		$this->load->view('trans/trans_insert');
	}

	// method ini untuk menghapus data Trans_model
	public function delete() {
		$id_trans_upn = $this->uri->segment(3);
		$this->Trans_model->delete($id_trans_upn);
		redirect($_SERVER['HTTP_REFERER']);
	}

	// method ini untuk menambahkan data ke dalam Trans_model
	public function save() {
		$this->Trans_model->save($this->input->post());
		redirect('Trans_controller/index');
	}

	// method ini untuk membuka view form tempat update trans
	public function update() {
		$id_trans_upn = $this->uri->segment(3);
		$data['current_trans'] = $this->Trans_model->getById($id_trans_upn);
		$this->load->view('trans/trans_update', $data);
	}	

	// method ini untuk melakukan proses update data Trans_model
	public function edit() {
		$this->Trans_model->edit($this->input->post());
		redirect('Trans_controller/index');
	}
}
