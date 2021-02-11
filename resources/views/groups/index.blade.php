@extends('templates.master')


@section('conteudo-view')
    <div class="container-form" id="container-form">

        <div class="form">
            <div class="form-title"><h2>Cadastro De Grupos</h2></div>

            {!! Form::open([ 'route'=>'group.store' ,'method' => 'post', 'class'=> 'form-padrao']) !!}

                <div class="form-input">
                    @include('templates.formulario.input', ['label'=> 'NOME DO GRUPO','input' => 'name', 'attributes' => ['placeholder'=> '']])
                </div>
                <div class="form-input">
                    @include('templates.formulario.select', ['label'=> 'NOME DO USUÁRIO','select' => 'user_id','data' => $user_list ])
                </div>
                <div class="form-input">
                    @include('templates.formulario.select', ['label'=> 'NOME DA INSTITUIÇÃO','select' => 'institution_id', 'data' => $institutions_list])
                </div>
                <div class="form-submit">
                    @include('templates.formulario.submit',['input'=> 'Cadastrar'])
                </div>
            {!!Form::close()!!}
        </div>
    </div>
    <div class="form-title"><h2> Grupos Cadastrados </h2></div>
    @include('groups.list', ['groups_list' => $groups])

@endsection

