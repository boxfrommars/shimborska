
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log In</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        .login-block {
            width: 600px;
            margin: 10% auto 0;
            background: #eee;
            padding: 20px 20px 10px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="login-block">
        {!! Form::open(['url' => '/auth/login', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        {!! Form::textField('Email', 'email') !!}
        {!! Form::passwordField('Password', 'password') !!}
        {!! Form::checkboxField('Remember me', 'remember') !!}
        {!! Form::submitField() !!}
        {!! Form::close() !!}
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
