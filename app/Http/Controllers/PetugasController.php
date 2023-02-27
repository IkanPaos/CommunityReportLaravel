<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Barryvdh\DomPDF\PDF;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use Illuminate\Http\Request;


class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.dashboard');
    }

    public function tampiladmin()
    {
        $admin = Petugas::with('petugas')->get();

        return view('petugas.admin', ['listAdmin' => $admin]);
    }

    public function tampilmasyarakat()
    {
        $masyarakat = Masyarakat::with('masyarakat')->get();
        
        return view('petugas.masyarakat', ['listMasyarakat' => $masyarakat]);
    }

    public function tampilpengaduan()
    {
        $report = Pengaduan::all();
        return view('petugas.report', ['listPengaduan' => $report]);
    }

    public function edit(Request $request, $id)
    {
       $pengaduan = Pengaduan::findOrFail($id);
        return view('petugas.edit', ['pengaduan' =>$pengaduan]);
    }

    public function update(Request $request, $id)
    {
       $pengaduan = Pengaduan::findOrFail($id);

       $pengaduan->update($request->all());
        return redirect()->route('petugas.report');
    }

    public function destroy($id)
    {
       $pengaduan = Pengaduan::where('id_pengaduan',$id)->delete();
        return redirect('/petugas/report');
    }

    public function deleteadmin($id)
    {
       $admin = Petugas::find($id)->delete();
        return redirect('/petugas/admin');
    }

    public function deletemasyarakat($id)
    {
       $admin = Masyarakat::find($id)->delete();
        return redirect('/petugas/masyarakat');
    }
}