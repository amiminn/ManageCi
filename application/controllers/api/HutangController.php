<?php

class HutangController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data = $this->db->order_by('id', 'DESC')->get('tbl_hutang')->result();
        $response = [
            'data' => $data,
            'msg'  => 'success',
            'status' => 200
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function destroy()
    {
        $this->db->truncate('tbl_barang');
        $this->db->truncate('tbl_hbeli');
        $this->db->truncate('tbl_dbeli');
        $this->db->truncate('tbl_hutang');
        $this->db->truncate('tbl_stock');
        $this->db->truncate('tbl_suplier');

        $response = [
            'msg' => 'reset success',
            'status' => 200
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
