<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard Masyarakat</h1>
    <br><br>
    <a href="{{route('masyarakat.create')}}">Laporkan</a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" value="Keluar">
    </form> 
    @foreach ($pengaduan as $data)
        <p>Tanggal : <?= $data->tgl_pengaduan ?></p>
        <p>NIK : <?= $data->nik ?></p>
        <?php if($data->status == 0) : ?>
        <p>Menunggu</p>
        <?php elseif ($data->status == 'proses') : ?>
        <p>Di Proses</p>
        <?php elseif ($data->status == 'selesai') : ?>
        <p>Selesai</p>
        <?php endif; ?>
        <br>
        <a href="{{route('masyarakat.show', $data->id_pengaduan)}}"><button>Keterangan</button></a>
        <a href="masyarakat/{{$data->id_pengaduan}}/edit"><button>Ubah</button></a>
    <form action="/masyarakat/{{$data->id_pengaduan}}" method="post"><br>
        @method('delete')
        @csrf
        <button type="submit">Hapus</button>
    </form>
    @endforeach
</body>
</html>