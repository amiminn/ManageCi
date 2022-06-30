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
        <a href="<?php echo base_url(); ?>pembelian"><i class="fas fa-store"></i> Pembelian</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg mt-2 mb-2">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                    </ol>
                </nav>
            </div>
        </nav>

        <div class="row">
            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h1 class="d-inline">20</h1>
                        <p class="d-inline">Barang</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h1 class="d-inline">20</h1>
                        <p class="d-inline">Suplier</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h1 class="d-inline">20</h1>
                        <p class="d-inline">Transaksi</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Responsive Sidebar Example</h2>
                <p>
                    This example use media queries to transform the sidebar to a top
                    navigation bar when the screen size is 700px or less.
                </p>
                <p>
                    We have also added a media query for screens that are 400px or less,
                    which will vertically stack and center the navigation links.
                </p>
                <h3>Resize the browser window to see the effect.</h3>
            </div>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>