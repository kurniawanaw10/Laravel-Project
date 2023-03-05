<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
		<!--  All snippets are MIT license http://bootdey.com/license -->
		<title>Invoice Wira Wiri Solo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	</head>

	<body>
		<div class="page-content container my-3 pt-3">
			<div class="container px-0">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col-5">
								<img src="{{ asset('dist/img/logo-1.png') }}" alt="">
							</div>
							<div class="col-7">
								<div class="text-110">
									<span class="text-default-d3"><i class="fa fa-home" aria-hidden="true"></i> Gg. Ar Rahmah 3 No.30 Windan Rt3/7 Gumpang, Kartasura, Sukoharjo  </span> <br>
									<span class="text-default-d3"><i class="fa fa-phone-square" aria-hidden="true"></i> 0812 2567 1933 – 085 725 6666 81  </span> <br>
									<span class="text-default-d3"><i class="fa fa-envelope" aria-hidden="true"></i> wirawiri.solo@gmail.com </span> <br>
									<span class="text-default-d3"><i class="fa fa-instagram" aria-hidden="true"></i> wirawiri_solo </span> 
								</div>
							</div>
						</div>
						<hr class="row brc-default-l1 mx-n1 mb-4 mt-3" />
						<h3 class="pt-3 text-center">Laporan Transaksi</h3>
						<div class="pb-3 mb-4 text-center">
							<p>Tanggal : {{ date('d F Y', strtotime($awal)) }} - {{ date('d F Y', strtotime($akhir)) }}</p>
						</div>
						<table class="table table-bordered table-responsive-lg text-center">
							<thead class="thead-dark">
								<tr>
									<th>No.</th>
									<th>Nama Pengguna</th>
									<th>Nomor Pengguna</th>
									<th>Nama Mobil</th>
									<th>Plat Nomor</th>
									<th>Tgl Pinjam</th>
									<th>Tgl Kembali</th>
									<th>Status</th>
									<th colspan="2">Biaya</th>
								</tr>
							</thead>
							@foreach ($laporan as $cetak)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $cetak->user->nama_lengkap }}</td>
								<td>{{ $cetak->user_nomor }}</td>
								<td>{{ $cetak->nama_mobil }}</td>
								<td>{{ $cetak->plat_nomor }}</td>
								<td>{{ date('d F Y', strtotime($cetak->tgl_pinjam)) }}</td>
								<td>{{ date('d F Y', strtotime($cetak->tgl_kembali)) }}</td>
								<td>
									@if ($cetak->status == 'Progress')
										<a class="badge btn-warning btn-sm text-decoration-none disabled">On Progress</a>
									@elseif ($cetak->status == 'Done')
										<a class="badge btn-success btn-sm text-decoration-none disabled">Done</a>
									@elseif ($cetak->status == 'Paid')
										<a class="badge btn-info btn-sm text-decoration-none disabled">Paid</a>
									@else
										<a class="badge btn-danger btn-sm text-decoration-none disabled">Unpaid</a>
									@endif
								</td>
								<td width="15%">@currency($cetak->harga)</td>
							</tr>
							@endforeach
							<tr>
								<td colspan="8"><b>Total Pendapatan</b></td>
								<td colspan="2">@currency($laporan->sum('harga'))</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

        <style type="text/css">
			body{
				margin-top:20px;
				color: #484b51;
			}
			.text-secondary-d1 {
				color: #728299!important;
			}
			.page-header {
				margin: 0 0 1rem;
				padding-bottom: 1rem;
				padding-top: .5rem;
				border-bottom: 1px dotted #e2e2e2;
				display: -ms-flexbox;
				display: flex;
				-ms-flex-pack: justify;
				justify-content: space-between;
				-ms-flex-align: center;
				align-items: center;
			}
			.page-title {
				padding: 0;
				margin: 0;
				font-size: 1.75rem;
				font-weight: 300;
			}
			.brc-default-l1 {
				border-color: #dce9f0!important;
			}

			.ml-n1, .mx-n1 {
				margin-left: -.25rem!important;
			}
			.mr-n1, .mx-n1 {
				margin-right: -.25rem!important;
			}
			.mb-4, .my-4 {
				margin-bottom: 1.5rem!important;
			}

			hr {
				margin-top: 1rem;
				margin-bottom: 1rem;
				border: 0;
				border-top: 1px solid rgba(0,0,0,.1);
			}

			.text-grey-m2 {
				color: #888a8d!important;
			}

			.text-success-m2 {
				color: #86bd68!important;
			}

			.font-bolder, .text-600 {
				font-weight: 600!important;
			}

			.text-110 {
				font-size: 110%!important;
			}
			.text-blue {
				color: #478fcc!important;
			}
			.pb-25, .py-25 {
				padding-bottom: .75rem!important;
			}

			.pt-25, .py-25 {
				padding-top: .75rem!important;
			}
			.bgc-default-tp1 {
				background-color: rgba(121,169,197,.92)!important;
			}
			.bgc-default-l4, .bgc-h-default-l4:hover {
				background-color: #f3f8fa!important;
			}
			.page-header .page-tools {
				-ms-flex-item-align: end;
				align-self: flex-end;
			}

			.btn-light {
				color: #757984;
				background-color: #f5f6f9;
				border-color: #dddfe4;
			}
			.w-2 {
				width: 1rem;
			}

			.text-120 {
				font-size: 120%!important;
			}
			.text-primary-m1 {
				color: #4087d4!important;
			}

			.text-danger-m1 {
				color: #dd4949!important;
			}
			.text-blue-m2 {
				color: #68a3d5!important;
			}
			.text-150 {
				font-size: 150%!important;
			}
			.text-60 {
				font-size: 60%!important;
			}
			.text-grey-m1 {
				color: #7b7d81!important;
			}
			.align-bottom {
				vertical-align: bottom!important;
			}
		</style>

        <script type="text/javascript">
            window.print();
            
        </script>
	</body>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</html>