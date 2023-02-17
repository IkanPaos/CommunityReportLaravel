<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    @if (session('success'))
    <p>{{session('success')}}</p>  
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $err)
    <p>{{$err}}</p>        
    @endforeach
    @endif
<center>
    <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <td>
                <label>Username :</label><br>
                <input type="text" name="username" value="{{ old('username') }}" /><br><br>
            </td>
            <td>
                <label>Password :</label><br>
                <input type="password" name="password" /><br><br>
            </td>
            <td>
                <button>Login</button>
            </td>
        </form>
        <a href="{{route('register.action')}}"><button>Register</button></a>
    </center>
    
</body>
</html>