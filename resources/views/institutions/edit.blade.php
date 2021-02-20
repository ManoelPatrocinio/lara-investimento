@extends('templates.master')

@section('conteudo-view')

    <div class="container-form" id="container-form">

        <div class="form">
            <div class="form-title"><h2>Cadastro De Instituição</h2></div>

            {!! Form::model( $institution,['route' => ['institutions.update', $institution->id ], 'method' => 'put', 'class'=> 'form-padrao']) !!}

                <div class="form-input">
                    @include('templates.formulario.input', ['label'=> 'NOME','input' => 'name', 'attributes' => ['placeholder'=> '']])
                </div>

                <div class="form-submit">
                    @include('templates.formulario.submit',['input'=> 'Atualizar'])
                </div>

            {!!Form::close()!!}
        </div>

    </div>

@endsection
