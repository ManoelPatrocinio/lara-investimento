@extends('templates.master')


@section('conteudo-view')
    <div class="container-form" id="container-form">

        <div class="form">
            <div class="form-title"><h2>Edição de Grupo</h2></div>

            {!! Form::model( $group,[ 'route'=>['group.update', $group->id] ,'method' => 'put', 'class'=> 'form-padrao']) !!}

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
                    @include('templates.formulario.submit',['input'=> 'Atualizar'])
                </div>
            {!!Form::close()!!}
        </div>
    </div>

@endsection

