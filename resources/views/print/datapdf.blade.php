<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Laporan</title>
    <link rel="stylesheet" href="{{ asset('css/print.css') }}" media="print">
</head>
<body>
    <h4>Laporan</h4>
    <hr>
    <center>
        <h2>Daftar Laporan</h2>
        <table border="1" width=800px style="margin: 0 auto;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>NIK</th>
                    <th>Laporan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listPengaduan as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $list->tgl_pengaduan }}</td>
                        <td>{{ $list->nik }}</td>
                        <td>{{ $list->isi_laporan }}</td>
                        <td><?php if($list->status == 0) : ?>
                            Menunggu
                            <?php elseif($list->status == 'proses') : ?>
                            Sedang di Proses
                            <?php elseif($list->status == 'selesai') : ?>
                            Selesai
                            <?php endif; ?>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>
