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
		<a class="active" href="<?php echo base_url(); ?>suplier"><i class="fas fa-truck"></i> Suplier</a>
	</div>

	<div class="content">
		<nav class="navbar navbar-expand-lg mt-2 mb-2">
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="#">Suplier</a></li>
					</ol>
				</nav>
			</div>
		</nav>

		<div class="alert alert-success" role="alert" hidden>
			Suplier Baru telah <b>Berhasil</b> Ditambahkan.
		</div>

		<div class="card mb-2" id="cf" hidden>
			<div class="card-body">
				<form id="form">
					<div class="row">
						<div class="col-md-6">
							<div class="form-outline mb-4">
								<input type="text" id="kodespl" class="form-control" value=" " autocomplete="off" disabled />
								<label class="form-label" for="kodespl">Kode Suplier</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-outline mb-4">
								<input type="text" id="namaspl" class="form-control" autocomplete="off" />
								<label class="form-label" for="namaspl">Nama Suplier</label>
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
				Data Suplier
				<button class="btn btn-info btn-sm float-end" id="show">tambah suplier</button>
			</div>
			<table class="table align-middle mb-0 bg-white mb-2">
				<thead class="bg-light">
					<tr>
						<th>Kode Suplier</th>
						<th>Nama Suplier</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>

	<!-- MDB -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(() => {
			$('.del').click((event) => {
				event.preventDefault();
				getData()
			})

			function getData() {
				$.get("http://localhost/ciku/api/suplier", (res) => {
					let data = res.data;
					let isi = "";
					data.map((d) => {
						isi += `<tr><td>${d.KODESPL}</td><td>${d.NAMASPL}</td><td><a href='http://localhost/ciku/pembelian/${d.KODESPL}' class="btn btn-success btn-sm">Belanja</a> <a class="btn btn-danger btn-sm del" href="api/suplier/${d.ID}/del" >delete</a></td></tr>`;
						$("tbody").html(isi);
					});

					if (res.data[0] == null) {
						$('#kodespl').val('SP-01')
					} else {
						let str = res.data[0].KODESPL;
						let part = str.substring(3) / 1 + 1;
						$('#kodespl').val(`SP-${zero(part, 2)}`)
					}

				});
			}
			getData();

			function zero(num, size) {
				var s = num + "";
				while (s.length < size) s = "0" + s;
				return s;
			}

			$("#show").click(() => {
				$(".card").removeAttr("hidden");
			});

			$("#form").submit((event) => {
				event.preventDefault();
				$("#submit").html("...");
				let kodeSpl = $("#kodespl").val();
				let namaSpl = $("#namaspl").val();
				$.post(
					"http://localhost/ciku/api/suplier", {
						KODESPL: kodeSpl,
						NAMASPL: namaSpl,
					},
					(res) => {
						$("#submit").html("submit");
						$("#namaspl").val("");
						getData();
						$('.alert').removeAttr('hidden')
					}
				);
			});
		});
	</script>
</body>

</html>