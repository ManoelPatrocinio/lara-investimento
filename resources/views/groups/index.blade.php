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

    <div class="conteiner-table">
        <div class="form-title"><h2>Instituições Cadastradas </h2></div>
        <table class="table-inst">
            <thead>
                <tr>
                    <td>Grupo</td>
                    <td>Instituição</td>
                    <td>Responsável</td>
                    <td>Opção</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->institutions->name }}</td>
                    <td>{{ $group->user->name }}</td>
                    <td>
                        {!! Form::open(['route'=> ['institutions.destroy', $group->id], 'method'=>'DELETE' ]) !!}
                        {!! Form::submit('Remover') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

