<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
{{Form::open(['route' => ['store'], 'method' => 'POST'])}}
{{ Form::label('name', 'Имя пользователя') }}
{{ Form::text('name') }}
@error('name')
<p class="text-red-500"> {{$message}}</p>
@enderror
<br>
{{ Form::label('email', 'Электронная почта') }}
{{ Form::text('email') }}
@error('email')
<p class="text-red-500"> {{$message}}</p>
@enderror
<br>
{{ Form::label('password', 'Пароль') }}
{{ Form::password('password') }}
@error('password')
<p class="text-red-500"> {{$message}}</p>
@enderror
<br>
{{ Form::label('confirmed_password', 'Подтверждение пароля') }}
{{ Form::password('password_confirmation') }}
@error('password_confirmation')
<p class="text-red-500"> {{$message}}</p>
@enderror
<br>
{{Form::submit('Зарегистрироваться') }}
{{ Form::close() }}
</body>
</html>
