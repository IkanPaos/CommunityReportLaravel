<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>
    <h4>Tambah Laporan</h4>
    <hr>
    <form action="{{route('masyarakat.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="tgl_pengaduan">Tanggal</label><br>
        <input type="date" name="tgl_pengaduan" id="tgl_pengaduan"><br>
        <label for="nik">NIK</label><br>
        <input type="text" name="nik" id="nik"><br>
        <label for="location">Laporan</label><br>
        <input type="text" name="isi_laporan" id="isi_laporan"><br>
        <label for="temperature">Foto</label><br>
        <input type="file" name="foto" id="foto"><br>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>