<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Laporan</title>
</head>
<body>
    <h4>Laporan</h4>
    <hr>
    <a href=""><button name="button" type="submit">Cetak</button></a>
        <h2>Daftar Laporan</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>NIK</th>
                    <th>Laporan</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listPengaduan as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->tgl_pengaduan}}</td>
                        <td>{{$list->nik}}</td>
                        <td>{{$list->isi_laporan}}</td>
                        <td><img src="{{Storage::url('public/images/').$list->foto}}" style="width: 200pt"></td>
                        <td><?php if($list->status == 0) : ?>
                        Menunggu
                        <?php elseif($list->status == 'proses') : ?>
                        Sedang di Proses
                        <?php elseif($list->status == 'selesai') : ?>
                        Selesai
                        <?php endif; ?>
                        </td>
                        <td>
                            <form action="/petugas/delete{{$list->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit">Delete</button>
                            <a href="{{route('petugas.edit',$list->id)}}">Edit</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <a href="/petugas/dashboard">Kembali</a>
        </table>
</body>
</html>