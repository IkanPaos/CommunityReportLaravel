<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keterangan</title>
</head>
<body>
    <h4>Keterangan Laporan</h4>
    <a href="/masyarakat/dashboard">Kembali</a>
        <hr>
            <br>
            <td>Tanggal : <?= $pengaduan->tgl_pengaduan ?></td><br>
            <td>NIK : <?= $pengaduan->nik ?></td><br>
            <td>Laporan : <?= $pengaduan->isi_laporan ?></td><br>                
            <td><img src="{{ Storage::url('public/images/').$pengaduan->foto }}" style="width: 150px"></td><br>
                <td>Status : <?php if ($pengaduan->status == 0) : ?>
                    Belum diproses
                <?php elseif ($pengaduan->status == 'proses') : ?>
                    Sedang diproses
                <?php elseif ($pengaduan->status == 'selesai') : ?>
                    Selesai diproses
                <?php endif ; ?></td><br>
                <br>
                <a href="{{ route('masyarakat.edit', $pengaduan->id_pengaduan)}}">Edit</a>
                    <hr>
            </tbody>
    </form>
</body>
</html>