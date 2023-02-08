<center>
@extends('app')
@section('content')

        @if(session('success'))
        <p>{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p>{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <td>
                <label>NIK :</label><br>
                <input type="text" name="nik" value="{{ old('nik') }}" /><br><br>
            </td>
            <td>
                <label>Password :</label><br>
                <input type="password" name="password" /><br><br>
            </td>
            <td>
                <button>Login</button>
                <a href="{{ route('register') }}"><button>Register</button></a>
            </td>
        </form>
    </center>
@endsection