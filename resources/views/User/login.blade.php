<!DOCTYPE html>
<html>

<head>
    <title>Login | Investimentos</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
</head>

<body>

    <div id="background" class="login">
       <img src="{{ asset('asset/images/investiment.jpg') }}" alt="img-investimetos">
    </div>


    <div id="conteudo-view" class="login">

        <h1>Investindo</h1>
        <h3>O nosso gerenciador de investimentos</h3>

        {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}
            <p>Acesse o sistema</p>

            <label>
                {!! Form::text('username',null,['class' => 'input','placeholder' =>"Usuário"]) !!}
            </label>
            <label>
            {!! Form::password('password',['placeholder' =>"Senha"]) !!}
            {!! Form::submit('Entrar') !!}
            </label>
        {!! Form::close() !!}
    </div>
    <div class="login"></div>

</body>
</html>
