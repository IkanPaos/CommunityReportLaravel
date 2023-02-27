<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Petugas;

class TanggapanController extends Controller
{
    public function index() {
        $pengaduan = Pengaduan::all();
        return view('create', compact('pengaduan'));
    }

    public function tampiltanggapan()
    {
        $petugas = Petugas::findOrFail($id);
        
        return view('create', ['listMasyarakat' => $masyarakat]);
    }

    public function create($id)
    {
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->first();
        $petugas = DB::table('petugas')->where('id_petugas',$id)->first();
        
        return view('tanggapan.create', ['pengaduan' => $pengaduan, 'petugas' => $petugas]);
    }

    public function store(Request $request, $id_pengaduan)
    {
        
        $validatedData = $request->validate([
            'tgl_tanggapan' => 'required|date',
            'tanggapan' => 'required',
            'id_petugas' => 'required|exists:petugas,id'
        ]);

        $tanggapan = new Tanggapan;
        $tanggapan->id_pengaduan = $id_pengaduan;
        $tanggapan->tgl_tanggapan = $validatedData['tgl_tanggapan'];
        $tanggapan->tanggapan = $validatedData['tanggapan'];
        $tanggapan->id_petugas = $validatedData['id_petugas'];
        $tanggapan->save();

        return redirect()->route('tanggapan.create')->with('success', 'Tanggapan berhasil ditambahkan.');
    }
}
