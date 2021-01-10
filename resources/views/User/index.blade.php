
@extends('templates.master')

@section('css-view')
@endsection

@section('conteudo-view')
    {!! Form:open(['method' => 'post', 'class'=> 'form-padrao']) !!}
        @include('templates.fomulario.input', ['input' => 'cpf', 'attributes' => ['placeholder'=> 'CPF']])
        @include('templates.fomulario.input', ['input' => 'name', 'attributes' => ['placeholder'=> 'Nome']])
        @include('templates.fomulario.input', ['input' => 'phone', 'attributes' => ['placeholder'=> 'Telefone']])
        @include('templates.fomulario.input', ['input' => 'email', 'attributes' => ['placeholder'=> 'E-mail']])
        @include('templates.fomulario.password', ['input' => 'password', 'attributes' => ['placeholder'=> 'Senha']])
        @include('templates.formulario.submit',['input'=> 'Cadastrar']

    {!! Form:close([]) !!}
@endsection

@section('js-view')
@endsection
