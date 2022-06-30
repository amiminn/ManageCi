<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
</head>

<body>
    <div class="sidebar">
        <a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> Dashboard</a>
        <a href="<?php echo base_url(); ?>barang"><i class="fas fa-box"></i> Barang</a>
        <a href="<?php echo base_url(); ?>suplier"><i class="fas fa-truck"></i> Suplier</a>
        <a class="active" href="<?php echo base_url(); ?>pembelian"><i class="fas fa-store"></i> Pembelian</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg mt-2 mb-2">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Pembelian</a></li>
                    </ol>
                </nav>
            </div>
        </nav>

        <div class="card">
            <div class="card-header">
                Data Pembelian
            </div>
            <table class="table align-middle mb-0 bg-white mb-2">
                <thead class="bg-light">
                    <tr>
                        <th>No. Transaksi</th>
                        <th>Kode Barang</th>
                        <th>Harga Beli</th>
                        <th>QTY</th>
                        <th>Diskon</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>021</td>
                        <td>021</td>
                        <td>2100</td>
                        <td>2</td>
                        <td>0</td>
                        <td>2100</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>