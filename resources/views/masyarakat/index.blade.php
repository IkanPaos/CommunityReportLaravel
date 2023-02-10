@extends('layouts.mainlayout')

@section('title','')
    @section('content')
    <h1>Pengaduan Masyarakat</h1>

    <a href="masyarakat/create"><button>Lapor</button></a><br><br>

    @if (Session::has('status'))
        {{Session::get('message')}}
    @endif

    <table>
    <tr>
        <td>Tanggal</td>
        <td>Laporan</td>
        <td>Status</td>
        <td>Aksi</td>
    </tr>
    @foreach ($laporan as $data)
    </table>
    @endforeach