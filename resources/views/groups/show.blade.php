@extends('templates.master')

@section('conteudo-view')

    <div>
        <h1>Grupo: {{ $group->name }}</h1>
        <h2>Instituição: {{ $group->institutions->name }}</h2>
        <h3>Responsável: {{ $group->user->name}}</h3>
    </div>

    {!! Form::open([ 'route'=>'group.store' ,'method' => 'post', 'class'=> 'form-padrao']) !!}

        <div class="form-input">
            @include('templates.formulario.select', [
                'label'=> 'Usuário',
                'select' => 'user_id',
                 'data' => $user_list
                ])
        </div>

        <div class="form-submit">
            @include('templates.formulario.submit',['input'=> 'Relacionar ao grupo: ' . $group->name ])
        </div>
    {!! Form::close() !!}

@endsection
