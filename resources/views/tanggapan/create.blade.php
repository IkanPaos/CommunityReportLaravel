<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tanggapan</title>
</head>
<body>
    <form action="{{route('tanggapan.store')}}" method="POST">
        @csrf
        <label for="id_pengaduan">Id Pengaduan</label><br>
        <input type="date" name="id_pengaduan" id="id_pengaduan" disabled><br>
        <label for="tgl_tanggapan">Tanggal</label><br>
        <input type="text" name="tgl_tanggapan" id="tgl_pengaduan" disabled><br>
        <label for="location">Tanggapan</label><br>
        <textarea name="tanggapan" id="isi_laporan"><br>
        <label for="id_petugas">Id Petugas</label>
        <input type="text" name="id_petugas" id="id_petugas" disabled>
        <br>
        <button type="submit">Kirim</button>
    </form>    
</body>
</html>