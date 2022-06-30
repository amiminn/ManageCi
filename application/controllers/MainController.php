<?php


class MainController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModel');
    }
    public function index()
    {
        // $data['data'] = $this->MainModel->getData();
        $this->load->helper('url');
        $this->load->view('dashboard/index');
    }

    public function barang()
    {
        $this->load->helper('url');
        $this->load->view('dashboard/barang');
    }

    public function suplier()
    {
        $this->load->helper('url');
        $this->load->view('dashboard/suplier');
    }

    public function pembelian()
    {
        $this->load->helper('url');
        $this->load->view('dashboard/pembelian');
    }
}
