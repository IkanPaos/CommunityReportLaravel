<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use App\Models\Petugas;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapans';

    protected $primaryKey = 'id_tanggapan';

    protected $fillable = ['id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas'];


    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

}