<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Driver_model');
	}

	// method ini untuk mengambil semua data dari Driver_model
	public function index() {
		$data['data_bus'] = $this->Driver_model->getAll();
		$this->load->view('driver/driver_index', $data);		
	}

	// method ini untuk menghapus data Driver_model
	public function delete() {
		$id_driver = $this->uri->segment(3);
		$this->Driver_model->delete($id_driver);
		redirect($_SERVER['HTTP_REFERER']);
	}

	// method ini untuk membuka view form tempat insert driver
	public function insert() {
		$this->load->view('driver/driver_insert');
	}

	// method ini untuk menambahkan data ke dalam Driver_model
	public function save() {
		$this->Driver_model->save($this->input->post());
		redirect('Driver_controller/index');
	}

	// method ini untuk membuka view form tempat update driver
	public function update() {
		$id_driver = $this->uri->segment(3);
		$data['current_driver'] = $this->Driver_model->getById($id_driver);
		$this->load->view('driver/driver_update', $data);
	}

	// method ini untuk melakukan proses update data Driver_model
	public function edit() {
		$this->Driver_model->edit($this->input->post());
		redirect('Driver_controller/index');
	}

	// mengambil seluruh income driver
	public function income() {
		$id_driver = $this->uri->segment(3);
		$data['id_driver'] = $id_driver;
		$data['driver_income'] = $this->Driver_model->getAllIncome($id_driver);
		$this->load->view('driver/driver_income', $data);
	}

	// filter income driver by month
	public function filterByMonth() {
		$id_driver = $this->uri->segment(3);
		$data['id_driver'] = $id_driver;
		$data['driver_income'] = $this->Driver_model->filterByMonth($this->input->post());
		if(count($data['driver_income']) > 0){
			$this->load->view('driver/driver_income', $data);
		} else {
			$data['driver_income'] = $this->Driver_model->getAllIncome($id_driver);
			$this->load->view('driver/driver_income', $data);
		}
	}
}
