<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    


        @if ($errors->any())
        @foreach ($errors->all() as $err)
        <p>{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('register.action')}}" method="POST">
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
                <label>Konfirmasi Password :</label><br>
                <input type="password" name="password_confirm" id="password_confirm" value="{{ old('password')}}" /><br><br>
            </td><br>
            <td>
                <button>Register</button>
            </td>
        </form>
    
</body>
</html>