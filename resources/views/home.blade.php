@extends('layouts/mainlayout')
@section('content')
<h1>Selamat Datang</h1>
<h6>Aplikasi Pengaduan Masyarakat</h6>
    <textarea id="floatingTextarea" placeholder="Leave a Comment"></textarea>
    <label for="floatingTextarea">Selamat Datang di...</label>
        <a href="logout"><button>Logout</button></a>
        <a href="pengaduan/create"><button>Tambah Pengaduan</button></a>

@endsection