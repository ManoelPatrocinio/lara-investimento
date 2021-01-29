
@extends('templates.master')

@section('css-view')
@endsection

@section('conteudo-view')

    @if(session('CadSuccess'))
        <h3> {{ session('CadSuccess')['messages'] }}</h3>
    @endif

    <div class="container-form">

        {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class'=> 'form-padrao']) !!}

            @include('templates.formulario.input', ['label'=> 'CPF','input' => 'cpf', 'attributes' => ['placeholder'=> '']])
            @include('templates.formulario.input', ['label'=> 'NOME','input' => 'name', 'attributes' => ['placeholder'=> 'Nome Completo']])
            @include('templates.formulario.input', ['label'=> 'TELEFONE','input' => 'phone', 'attributes' => ['placeholder'=> '(__) _____-____']])
            @include('templates.formulario.input', ['label'=> 'E-MAIL','input' => 'email', 'attributes' => ['placeholder'=> 'E-mail']])
            @include('templates.formulario.password', ['label'=> 'SENHA','input' => 'password', 'attributes' => ['placeholder'=> 'Senha']])
            @include('templates.formulario.submit',['input'=> 'Cadastrar'])

        {!! Form::close([]) !!}
    </div>


@endsection

@section('js-view')
@endsection
