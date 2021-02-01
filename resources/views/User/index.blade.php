
@extends('templates.master')

@section('css-view')
@endsection

@section('conteudo-view')

    @if(session('success'))
        echo'<script>alert("Usuario Cadastrado") </script>';
    @endif

    <div class="container-form">

        <div class="form">
            <div class="form-title"><h2>Cadastro De Usuário</h2></div>

            {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class'=> 'form-padrao']) !!}

                <div class="form-input">
                    @include('templates.formulario.input', ['label'=> 'NOME','input' => 'name', 'attributes' => ['placeholder'=> '']])
                </div>

                <div class="row input-group">

                    <div class="group-item">
                        @include('templates.formulario.input', ['label'=> 'NASCIMENTO','input' => 'birth', 'attributes' => ['maxlength'=>'10', 'size'=>'10']])
                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                    </div>


                    <div class="group-item">
                        @include('templates.formulario.input', ['label'=> 'GÊNERO','input' => 'gender', 'attributes' => ['maxlength'=>'9', 'size'=>'9']])
                    </div>

                </div>


                <div class="row input-group" >
                    <div class="group-item">
                        @include('templates.formulario.input', ['label'=> 'CPF','input' => 'cpf', 'attributes' => ['maxlength'=>'14', 'size'=>'14']])
                    </div>

                    <div class=" group-item">
                        @include('templates.formulario.input', ['label'=> 'TELEFONE','input' => 'phone', 'attributes' => ['maxlength'=>'14', 'size'=>'14']])
                    </div>
                </div>

                <div class="row input-group">
                    <div class="group-item">
                        @include('templates.formulario.input', ['label'=> 'E-MAIL','input' => 'email', 'attributes' => ['placeholder'=> '']])
                    </div>

                    <div class="group-item">
                        @include('templates.formulario.password', ['label'=> 'SENHA','input' => 'password', 'attributes' => ['placeholder'=> '']])
                    </div>
                </div>

                <div class="form-submit">
                    @include('templates.formulario.submit',['input'=> 'Cadastrar'])
                </div>

            {!! Form::close([]) !!}
        </div>
    </div>

<div class="conteiner-table">
    <table>
        <thead>
            <td>Nome</td>
            <td>Cpf</td>
            <td>Contato</td>
            <td>Nascimento</td>
            <td>E-mail</td>
            <td>Status</td>
            <td>Permissão</td>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name}}</td>
                <td>{{ $user->cpf}}</td>
                <td>{{ $user->phone}}</td>
                <td>{{ $user->birth}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->status}}</td>
                <td>{{ $user->permission}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

@section('js-view')
@endsection
