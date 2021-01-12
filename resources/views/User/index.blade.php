
@extends('templates.master')

@section('css-view')
@endsection

@section('conteudo-view')

    @if(session('CadSuccess'))
        <h3> {{ session('CadSuccess')['messages'] }}</h3>
    @endif

    <div class="container-form">
        {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class'=> 'form-padrao']) !!}

            @include('templates.formulario.input', ['label'=> 'CPF','input' => 'cpf', 'attributes' => ['placeholder'=> 'CPF']])
            @include('templates.formulario.input', ['label'=> 'NOME','input' => 'name', 'attributes' => ['placeholder'=> 'Nome']])
            @include('templates.formulario.input', ['label'=> 'TELEFONE','input' => 'phone', 'attributes' => ['placeholder'=> 'Telefone']])
            @include('templates.formulario.input', ['label'=> 'E-MAIL','input' => 'email', 'attributes' => ['placeholder'=> 'E-mail']])
            @include('templates.formulario.password', ['label'=> 'SENHA','input' => 'password', 'attributes' => ['placeholder'=> 'Senha']])
            @include('templates.formulario.submit',['input'=> 'Cadastrar'])
            </div>
        {!! Form::close([]) !!}
    </div>

    <div class="container-table">
        <table class="default-table">
            <tr>
                <td>#</td>
                <td>CPF</td>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Nascimento</td>
                <td>E-mail</td>
                <td>Status</td>
                <td>Permissão</td>
            </tr>
        </table>
    </div>
@endsection

@section('js-view')
@endsection
