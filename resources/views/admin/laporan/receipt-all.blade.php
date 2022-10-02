<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Innvoice</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>

	<body>
		<div class="p-5">
            <h3 class="pt-3 text-center">Laporan Transaksi</h3>
            <div class="pb-3 mb-4 text-center">
                <p>{{ $today }}</p>
            </div>
			<table class="table table-bordered table-responsive-lg text-center">
				<tr class="table-dark">
					<td>No.</td>
					<th>Nama Pengguna</th>
                    <th>Nomor Pengguna</th>
                    <th>Nama Mobil</th>
                    <th>Plat Nomor</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Driver</th>
                    <th>Biaya</th>
                    <th>Status</th>
				</tr>
				@foreach ($laporan as $cetak)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $cetak->user_nama }}</td>
                    <td>{{ $cetak->user_nomor }}</td>
                    <td>{{ $cetak->mobil_nama }}</td>
                    <td>{{ $cetak->mobil_nomor }}</td>
                    <td>{{ date('d F Y', strtotime($cetak->tgl_pinjam)) }}</td>
                    <td>{{ date('d F Y', strtotime($cetak->tgl_kembali)) }}</td>
                    <td>
                        @if ($cetak->driver == "YES")
                            <a class="badge btn-success btn-sm text-decoration-none disabled">Dengan Sopir</a>
                        @elseif ($cetak->driver == "NO")
                            <a class="badge btn-danger btn-sm text-decoration-none disabled">Tanpa Sopir</a>
                        @endif
                    </td>
                    <td width="10%">@currency($cetak->harga)</td>
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
				</tr>
                @endforeach
                <tr>
                    <td colspan="8"><b>Total Pendapatan</b></td>
                    <td colspan="2">@currency($laporan->sum('harga'))</td>
                </tr>
			</table>
		</div>
        <script type="text/javascript">
            window.print();
            
        </script>
	</body>
</html>