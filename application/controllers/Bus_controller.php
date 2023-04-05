<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bus_model');
	}

	// method ini untuk mengambil semua data dari Bus_model
	public function index() {
		$data['data_bus'] = $this->Bus_model->getAll();
		$this->load->view('bus/bus_index', $data);
	}
	
	// method ini untuk membuka view form tempat insert bus
	public function insert() {
		$this->load->view('bus/bus_insert');
	}

	// method ini untuk filter berdasarkan status
	public function status() {
		$status = $this->uri->segment(3);
		$data['data_bus'] = $this->Bus_model->getByStatus($status);
		$this->load->view('bus/bus_index', $data);
	}

	// method ini untuk membuka view form tempat update bus
	public function update() {
		$id_bus = $this->uri->segment(3);
		$data['current_bus'] = $this->Bus_model->getById($id_bus);
		$this->load->view('bus/bus_update', $data);
	}

	// method ini untuk menghapus data bus_model
	public function delete() {
		$id_bus = $this->uri->segment(3);
		$this->Bus_model->delete($id_bus);
		redirect($_SERVER['HTTP_REFERER']);
	}

	// method ini untuk menambahkan data ke dalam bus_model
	public function save() {
		$this->Bus_model->save($this->input->post());
		redirect('Bus_controller/index');
	}
	
	// method ini untuk melakukan proses update data bus_model
	public function edit() {
		$this->Bus_model->edit($this->input->post());
		redirect('Bus_controller/index');
	}
}
