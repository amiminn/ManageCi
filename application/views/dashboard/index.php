<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
</head>

<body>
    <div class="sidebar">
        <a class="active" href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> Dashboard</a>
        <a href="<?php echo base_url(); ?>barang"><i class="fas fa-box"></i> Barang</a>
        <a href="<?php echo base_url(); ?>suplier"><i class="fas fa-truck"></i> Suplier</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg mt-2 mb-2">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </nav>

        <div class="row">
            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h1 class="d-inline" id="brg"></h1>
                        <p class="d-inline">Jenis Barang</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h1 class="d-inline" id="spl"></h1>
                        <p class="d-inline">Suplier</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h1 class="d-inline" id="transaksi"></h1>
                        <p class="d-inline">Total Transaksi</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-header">
                Stok Barang
            </div>
            <div>
                <table class="table align-middle mb-0 bg-white mb-2">
                    <thead class="bg-light">
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Jumlah Stok Barang</th>
                        </tr>
                    </thead>
                    <tbody class="stock">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-header">
                <p class="d-inline">Detail Transaksi</p>
                <button class="btn btn-info btn-sm float-end viewD">lihat detail</button>
            </div>
            <div>
                <table class="table align-middle mb-0 bg-white mb-2 tb-d" hidden>
                    <thead class="bg-light">
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Kode Barang</th>
                            <th>Harga Beli</th>
                            <th>Jumlah</th>
                            <th>Diskon</th>
                            <th>Potongan Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="detail">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-header">
                <p class="d-inline">Detail Hutang</p>
                <button class="btn btn-info btn-sm float-end viewH">lihat detail</button>
            </div>
            <div>
                <table class="table align-middle mb-0 bg-white mb-2 tb-h" hidden>
                    <thead class="bg-light">
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Kode Suplier</th>
                            <th>Tanggal Beli</th>
                            <th>Jumlah Hutang</th>
                        </tr>
                    </thead>
                    <tbody class="hutang">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            function getData() {
                $.get('http://localhost/ciku/api/barang/stock', (res) => {
                    let isi = '';
                    let no = 1
                    let data = res.data
                    data.map((d) => {
                        isi += ` <tr><td>${no}</td><td>${d.KODEBRG}</td><td>${d.QTYBELI}</td></tr>`
                        $('.stock').html(isi)
                        no++
                    })

                })
            }
            getData()
            getAll()

            function getAll() {
                $.get('http://localhost/ciku/api/barang', (res) => {
                    $('#brg').html(res.data.length)
                })
                $.get('http://localhost/ciku/api/suplier', (res) => {
                    $('#spl').html(res.data.length)
                })
                $.get('http://localhost/ciku/api/pembelian', (res) => {
                    $('#transaksi').html(res.header.length)
                    let isi = ''
                    let data = res.detail
                    data.map((d) => {
                        isi += `<tr><td>${d.NOTRANSAKSI}</td><td>${d.KODEBRG}</td><td>${d.HARGABELI}</td><td>${d.QTY}</td><td>${d.DISKON}</td><td>${d.DISKONRP}</td><td>${d.TOTALRP}</td></tr>`;
                        $('.detail').html(isi)
                    })
                })
                $.get('http://localhost/ciku/api/hutang', (res) => {
                    let isi = ''
                    let data = res.data
                    data.map((d) => {
                        isi += `<tr><td>${d.NOTRANSAKSI}</td><td>${d.KODESPL}</td><td>${d.TGLBELI}</td><td>${d.TOTALHUTANG}</td></tr>`;
                        $('.hutang').html(isi)
                    })
                })
            }

            $('.viewD').click(() => {
                $('.tb-d').removeAttr('hidden')
            })
            $('.viewH').click(() => {
                $('.tb-h').removeAttr('hidden')
            })
        })
    </script>
</body>

</html>