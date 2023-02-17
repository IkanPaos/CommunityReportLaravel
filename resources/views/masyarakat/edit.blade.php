<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Laporan</title>
</head>

<body>
    <h4>Ubah Laporan</h4>
    <a href="/masyarakat/dashboard">Kembali</a>
    <hr>
    <form action="{{route('masyarakat.update', $pengaduan->id_pengaduan)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="tgl_pengaduan">Tanggal :</label><br>
        <input type="date" name="tgl_pengaduan" id="tgl_pengaduan" value="{{ $pengaduan->tgl_pengaduan }}"><br>
        <label for="nik">NIK :</label><br>
        <input type="text" name="nik" id="nik" value="{{ $pengaduan->nik }}"><br>
        <label for="laporan">Laporan :</label><br>
        <input type="text" name="isi_laporan" id="isi_laporan" value="{{ $pengaduan->isi_laporan }}"><br>
        <label for="foto">Foto :</label><br>
        <img src="{{ Storage::url('public/images/').$pengaduan->foto }}" style="width: 150px"><br>
        <input type="file" name="foto" id="foto"><br>
        <br>
        <button type="submit">Update</button>
    </form>
</body>

</html>
