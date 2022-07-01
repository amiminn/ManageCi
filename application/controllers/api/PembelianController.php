<?php

class PembelianController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $header = $this->db->order_by('id', 'DESC')->get('tbl_hbeli')->result();
        $detail = $this->db->order_by('id', 'DESC')->get('tbl_dbeli')->result();
        $response = [
            'header' => $header,
            'detail' => $detail,
            'msg'  => 'success',
            'status' => 200
        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function store()
    {
        $hbeli = array(
            'NOTRANSAKSI' => $this->input->post('NOTRANSAKSI'),
            'KODESPL' => $this->input->post('KODESPL'),
            // 'TGLBELI' => date('d F Y h:i:s A')
        );

        $dbeli = array(
            'NOTRANSAKSI' => $this->input->post('NOTRANSAKSI'),
            'KODEBRG' => $this->input->post('KODEBRG'),
            'HARGABELI' => $this->input->post('HARGABELI'),
            'QTY' => $this->input->post('QTY'),
            'DISKON' => $this->input->post('DISKON'),
            'DISKONRP' => $this->input->post('DISKONRP'),
            'TOTALRP' => $this->input->post('TOTALRP'),
        );

        $hutang = [
            'NOTRANSAKSI' => $this->input->post('NOTRANSAKSI'),
            'KODESPL' => $this->input->post('KODESPL'),
            // 'TGLBELI' => date('d F Y h:i:s A'),
            'TOTALHUTANG' => $this->input->post('TOTALRP'),
        ];


        $kodeBrg = $this->input->post('KODEBRG');
        $qtyBeli = $this->input->post('QTY');


        $this->db->set('QTYBELI', 'QTYBELI +' . $qtyBeli, false)->where('KODEBRG', $kodeBrg)->update('tbl_stock');
        $this->db->insert('tbl_hutang', $hutang);
        $this->db->insert('tbl_hbeli', $hbeli);
        $this->db->insert('tbl_dbeli', $dbeli);
        $response = [
            'hbeli' => $hbeli,
            'dbeli' => $dbeli,
            'msg'  => 'success',
            'status' => 201
        ];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function getBarang($name)
    {
        $data = $this->db->get_where('tbl_barang', array('KODEBRG' => $name), 1)->result();
        $response = [
            'data' => $data,
            'status' => 200
        ];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
