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
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg mt-2 mb-2">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $kode ?></a></li>
                    </ol>
                </nav>
            </div>
        </nav>

        <div class="alert alert-success" role="alert" hidden>
            <b>Berhasil</b> menambahkan Data baru.
        </div>

        <div class="card mb-2" id="cf">
            <div class="card-body">
                <form id="form">
                    <input id="kodespl" type="text" value="<?= $kode ?>" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="notransaksi" class="form-control" value=" " autocomplete="off" disabled />
                                <label class="form-label" for="notransaksi">Nomor Transaksi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="kodebrg" value="BM-" class="form-control" autocomplete="off" />
                                <label class="form-label" for="kodebrg">Kode Barang</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="number" id="hargabeli" value="0" class="form-control" autocomplete="off" disabled />
                                <label class="form-label" for="hargabeli">Harga Beli</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="number" id="qty" class="form-control" autocomplete="off" />
                                <label class="form-label" for="qty">QTY</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="number" id="diskon" class="form-control" autocomplete="off" />
                                <label class="form-label" for="diskon">Diskon %</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="diskonrp" value="0" class="form-control" disabled />
                                <label class="form-label" for="diskonrp">Diskon Potongan (Rp)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="total" value=" " class="form-control" autocomplete="off" disabled />
                        <label class="form-label" for="total">Total</label>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-2">
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
                            </tr>
                        </thead>
                        <tbody class="detail">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-2">
                    <div class="card-header">
                        List Barang
                    </div>
                    <table class="table align-middle mb-0 bg-white mb-2">
                        <thead class="bg-light">
                            <tr>
                                <th>No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                            </tr>
                        </thead>
                        <tbody class="listCode">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            function getData() {
                $.get('http://localhost/ciku/api/pembelian', (res) => {
                    let data = res.detail;
                    let isi = "";
                    data.map((d) => {
                        isi += `<tr><td>${d.NOTRANSAKSI}</td><td>${d.KODEBRG}</td><td>${d.HARGABELI}</td><td>${d.QTY}</td><td>${d.DISKON}%</td><td>${d.TOTALRP}</td></tr>`;
                        $(".detail").html(isi);
                    });

                    const y = new Date().getFullYear();
                    const m = new Date().getMonth();
                    const ym = y.toString() + zero(m, 2).toString()
                    if (res.header[0] == null) {
                        $('#notransaksi').val(`B${ym}001`)
                    } else {
                        let str = res.header[0].NOTRANSAKSI;
                        let part = str.substring(7) / 1 + 1;
                        $('#notransaksi').val(`B${ym}${zero(part, 3)}`)
                    }
                })
            }
            getData()

            function zero(num, size) {
                var s = num + "";
                while (s.length < size) s = "0" + s;
                return s;
            }

            $('#kodebrg').keyup(() => {
                let kodenya = $('#kodebrg').val()
                getBarang(kodenya)
            })

            $('#qty').keyup(() => {
                let hargabeli = $('#hargabeli').val()
                let qty = $('#qty').val()
                let totalAll = hargabeli * qty
                $('#total').val(totalAll)
                $('#diskon').keyup(() => {
                    let diskon = $('#diskon').val()
                    let potongan = totalAll * diskon / 100
                    $('#diskonrp').val(potongan)

                    let total = totalAll - potongan
                    $('#total').val(total)
                })
            })


            function getBarang(kode) {
                $.get(`http://localhost/ciku/api/pembelianGetBrg/${kode}`, (res) => {
                    try {
                        $('#hargabeli').val(res.data[0].HARGABELI)
                    } catch (error) {
                        $('#hargabeli').val(0);
                        $('#diskon').val('');
                        $('#diskonrp').val(0);
                        $('#total').val(0)
                    }
                })


            }

            function getList() {
                $.get('http://localhost/ciku/api/barang', (res) => {
                    let isi = ''
                    let data = res.data
                    no = 1
                    data.map(d => {
                        isi += `<tr><td>${no}</td><td>${d.KODEBRG}</td><td>${d.NAMABRG}</td></tr>`
                        $('.listCode').html(isi)
                        no++
                    })
                })
            }
            getList()


            $('#cf').submit((event) => {
                event.preventDefault()
                $('#submit').html('...')
                const noTransaksi = $('#notransaksi').val();
                const kodeSpl = $('#kodespl').val();
                const kodeBrg = $('#kodebrg').val();
                const hargaBeli = $('#hargabeli').val();
                const qty = $('#qty').val();
                const diskon = $('#diskon').val();
                const diskonRp = $('#diskonrp').val();
                const total = $('#total').val()
                $.post('http://localhost/ciku/api/pembelian', {
                    "NOTRANSAKSI": noTransaksi,
                    "KODESPL": kodeSpl,
                    "KODEBRG": kodeBrg,
                    "HARGABELI": hargaBeli,
                    "QTY": qty,
                    "DISKON": diskon,
                    "DISKONRP": diskonRp,
                    "TOTALRP": total
                }, (res) => {
                    $('#submit').html('submit')
                    $('#notransaksi').val('');
                    $('#kodebrg').val('BM-');
                    $('#hargabeli').val('');
                    $('#qty').val('');
                    $('#diskon').val('');
                    $('#diskonrp').val('');
                    $('#total').val('')
                    getData()
                    $('.alert').removeAttr('hidden')
                })
            })
        })
    </script>
</body>

</html>