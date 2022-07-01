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
        <a class="active" href="<?php echo base_url(); ?>barang"><i class="fas fa-box"></i> Barang</a>
        <a href="<?php echo base_url(); ?>suplier"><i class="fas fa-truck"></i> Suplier</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg mt-2 mb-2">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="">Barang</a></li>
                    </ol>
                </nav>
            </div>
        </nav>

        <div class="alert alert-success" role="alert" hidden>
            Barang Baru telah <b>Berhasil</b> Ditambahkan.
        </div>

        <div class="card mb-2" id="cf" hidden>
            <div class="card-body">
                <form id="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="kodebrg" class="form-control" value=" " autocomplete="off" disabled />
                                <label class="form-label" for="kodebrg">Kode Barang</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="namabrg" class="form-control" autocomplete="off" />
                                <label class="form-label" for="namabrg">Nama Barang</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="satuan" class="form-control" />
                                <label class="form-label" for="satuan">Satuan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="hargabeli" class="form-control" autocomplete="off" />
                                <label class="form-label" for="hargabeli">Harga Beli</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Data Barang
                <button class="btn btn-info btn-sm float-end" id="show">tambah data barang</button>
            </div>
            <table class="table align-middle mb-0 bg-white mb-2">
                <thead class="bg-light">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Harga Beli</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            function getData() {
                $.get('http://localhost/ciku/api/barang', (res) => {
                    let data = res.data
                    let isi = ''
                    data.map((d) => {
                        isi += `<tr><td>${d.KODEBRG}</td><td>${d.NAMABRG}</td><td>${d.SATUAN}</td><td>${d.HARGABELI}</td><td><a href="api/barang/${d.KODEBRG}/del" class="btn btn-danger btn-sm">delete</a></td></tr>`
                        $('tbody').html(isi)
                    })

                    if (res.data[0] == null) {
                        $('#kodebrg').val('BM-01')
                    } else {
                        let str = res.data[0].KODEBRG;
                        let part = str.substring(3) / 1 + 1;
                        $('#kodebrg').val(`BM-${zero(part, 2)}`)
                    }
                })
            }

            function zero(num, size) {
                var s = num + "";
                while (s.length < size) s = "0" + s;
                return s;
            }

            $('#show').click(() => {
                $('.card').removeAttr('hidden')
            });

            $('#form').submit((event) => {
                event.preventDefault();
                $('#submit').html('...')
                let kodeBrg = $('#kodebrg').val()
                let namaBrg = $('#namabrg').val()
                let satuan = $('#satuan').val()
                let hargaBeli = $('#hargabeli').val()
                $.post('http://localhost/ciku/api/barang', {
                    "KODEBRG": kodeBrg,
                    "NAMABRG": namaBrg,
                    "SATUAN": satuan,
                    "HARGABELI": hargaBeli
                }, (res) => {
                    $('#submit').html('submit')
                    $('#namabrg').val('')
                    $('#satuan').val('')
                    $('#hargabeli').val('')
                    getData()
                    $('.alert').removeAttr('hidden')
                })
            })

            getData()
        })
    </script>
</body>

</html>