<?php

class SuplierController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data = $this->db->order_by('id', 'DESC')->get('tbl_suplier')->result();
        $response = [
            'data' => $data,
            'msg'  => 'success',
            'status' => 200
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function store()
    {
        $data = array(
            'KODESPL' => $this->input->post('KODESPL'),
            'NAMASPL' => $this->input->post('NAMASPL')
        );

        $this->db->insert('tbl_suplier', $data);
        $response = [
            'data' => $data,
            'msg'  => 'success',
            'status' => 201
        ];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('tbl_suplier');
        header("Location: http://localhost/ciku/suplier");
        die();
    }
}
