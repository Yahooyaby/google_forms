<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
@error('email')
<p class="text-red-500">{{$message}}</p>
@enderror
{{Form::open(['route' => ['logging'], 'method' => 'POST'])}}
{{ Form::label('email', 'Электронная почта') }}
{{ Form::text('email') }}
{{ Form::label('password', 'Пароль') }}
{{ Form::text('password') }}
{{Form::submit('Войти') }}
{{ Form::close() }}
</body>
</html>
