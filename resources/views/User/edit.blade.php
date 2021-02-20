
@extends('templates.master')

@section('css-view')
@endsection

@section('conteudo-view')

    @if(session('success'))
        <script>alert("Operação realizada com Sucesso!")</script>

    @endif

    <div class="container-form">

        <div class="form">
            <div class="form-title"><h2>Cadastro De Usuário</h2></div>

            {!! Form::model($users,['route' => ['user.update',$users->id], 'method' => 'put', 'class'=> 'form-padrao']) !!}

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
                    @include('templates.formulario.submit',['input'=> 'Atualizar'])
                </div>

            {!! Form::close([]) !!}
        </div>
    </div>


    @endsection

@section('js-view')
@endsection
