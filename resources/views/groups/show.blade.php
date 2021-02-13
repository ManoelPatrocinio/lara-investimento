@extends('templates.master')

@section('conteudo-view')

    <div class="group-title">
        <h1>Grupo: {{ $group->name }}</h1>
        <h2>Instituição: {{ $group->institutions->name }}</h2>
        <h3>Responsável: {{ $group->user->name}}</h3>
    </div>

    <div class="connect-user-group">
        {!! Form::open([ 'route'=>['group.user.store', $group->id] ,'method' => 'post', 'class'=> 'form-padrao']) !!}

            <div class="form-input">
                @include('templates.formulario.select', [
                    'label'  => 'Usuário',
                    'select' => 'user_id',
                    'data'   => $user_list
                    ])
            </div>

            <div class="form-submit">
                @include('templates.formulario.submit',['input'=> 'Relacionar ao grupo: ' . $group->name ])
            </div>
        {!! Form::close() !!}
    </div>

    @include('User.list', ['user_list' => $group->usersRelationship])
@endsection
