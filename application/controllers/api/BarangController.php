<?php

class BarangController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data = $this->db->order_by('id', 'DESC')->get('tbl_barang')->result();
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
            'KODEBRG' => $this->input->post('KODEBRG'),
            'NAMABRG' => $this->input->post('NAMABRG'),
            'SATUAN' => $this->input->post('SATUAN'),
            'HARGABELI' => $this->input->post('HARGABELI')
        );

        $stock = array(
            'KODEBRG' => $this->input->post('KODEBRG'),
            'QTYBELI' => 0
        );

        $this->db->insert('tbl_stock', $stock);
        $this->db->insert('tbl_barang', $data);
        $response = [
            'data' => $data,
            'msg'  => 'success',
            'status' => 201
        ];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function destroy($id)
    {

        $response = [
            'msg'  => 'delete data success',
        ];
        echo json_encode($response);
    }

    public function stock()
    {
        $data = $this->db->get('tbl_stock')->result();
        $response = [
            'data' => $data,
            'msg'  => 'success',
            'status' => 200
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete($kode)
    {
        $this->db->where('KODEBRG', $kode)->delete('tbl_barang');
        $this->db->where('KODEBRG', $kode)->delete('tbl_stock');
        header("Location: http://localhost/ciku/barang");
        die();
    }
}
