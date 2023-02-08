@extends('app')
@section('content')

        @if ($errors->any())
        @foreach ($errors->all() as $err)
        <p>{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route ('register.action')}}" method="POST">
            @csrf
            <td>
                <label>NIK :</label><br>
                <input type="text" name="nik" id="nik" value="{{ old('nik')}}" /><br><br>
            </td>
            <td>
                <label>Nama :</label><br>
                <input type="text" name="nama" id="nama" value="{{ old('nama')}}" /><br><br>
            </td>
            <td>
                <label>Username :</label><br>
                <input type="text" name="username" id="username" value="{{ old('username')}}" /><br><br>
            </td>
            <td>
                <label>Telepon :</label><br>
                <input type="text" name="telp" id="telp" value="{{ old('telp')}}" /><br><br>
            </td>
            <td>
                <label>Password :</label><br>
                <input type="password" name="password" id="password" value="{{ old('password')}}" /><br><br>
            </td><br>
            <td>
                <button class="btn btn-primary">Register</button>
            </td>
        </form>
    
@endsection