<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use PDF;


class PengaduanController extends Controller
{
    public function index() {
        $pengaduan = Pengaduan::all();
        return view('masyarakat.dashboard', compact('pengaduan'));
    }

    public function create() {

        return view('masyarakat.create');
    }

    public function show($id) {
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->first();
        return view('masyarakat.show', compact('pengaduan'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'id_pengaduan'      => 'max:15',
            'tgl_pengaduan'     => 'required',
            'nik'               => 'required|max:10',
            'isi_laporan'       => 'required|max:255',
            'foto'              => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status',
            
        ]);

        $image = $request->file('foto');
        $image->storeAs('public/images', $image->hashName());
        
        Pengaduan::create([
            'id_pengaduan'      => $request->id_pengaduan,
            'tgl_pengaduan'     => $request->tgl_pengaduan,
            'nik'               => $request->nik,
            'foto'              => $image->hashName(),
            'isi_laporan'       => $request->isi_laporan,
            'status',
        ]);

        return redirect()->route('masyarakat.dashboard');
    
      }

    public function edit($id) 
    {
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->first();

        return view('masyarakat.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'tgl_pengaduan'     => 'required',
            'nik'               => 'required|max:10',
            'isi_laporan'       => 'required|max:255',
            'foto'              => 'image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);

        if ($request->hasFile('foto')) {
            
            $image = $request->file('foto');
            $image->storeAs('public/images', $image->hashName());

            DB::table('pengaduans')->where('id_pengaduan',$id)->update([
                'tgl_pengaduan'  => $request->tgl_pengaduan,
                'nik'            => $request->nik,
                'isi_laporan'    => $request->isi_laporan,
                'foto'           => $image->hashName(),
            ]);

        } else {
            $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->update([
                'tgl_pengaduan'             => $request->tgl_pengaduan,
                'nik'                       => $request->nik,
                'isi_laporan'               => $request->isi_laporan,
            ]);

        }

        return redirect()->route('masyarakat');
    }

    public function delete($id) {
        $pengaduan = DB::table('pengaduans')->where('id_pengaduan',$id)->delete();

        return redirect('masyarakat');
    }

    public function printPdf()
    {
    // Retrieve the data from your model or repository
    $listPengaduan = Pengaduan::all();

    $pdf = PDF::loadView('print.datapdf', compact('listPengaduan'))->setOptions([
        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
        'debugCss' => true, 'debugLayout' => true, 'debugLayoutLines' => true,
        'debugLayoutPaddingBox' => true, 'chroot' => public_path(),
    ]);

    // Generate the HTML for the PDF
    $html = view('print.datapdf')->with('listPengaduan', $listPengaduan)->render();

    // Generate the PDF using Dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    // Return the PDF as a download
    return $dompdf->stream('laporan.pdf');
}
}
