@extends('templates.master')

@section('conteudo-view')

    <div class="container-form" id="container-form">

        <div class="form">
            <div class="form-title"><h2>Cadastro De Instituição</h2></div>

            {!! Form::open(['route' => 'institutions.store', 'method' => 'post', 'class'=> 'form-padrao']) !!}

                <div class="form-input">
                    @include('templates.formulario.input', ['label'=> 'NOME','input' => 'name', 'attributes' => ['placeholder'=> '']])
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
                    <td>#</td>
                    <td>Nome</td>
                    <td>Opção</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($institutions as $inst)
                <tr>
                    <td>{{ $inst->id }}</td>
                    <td>{{ $inst->name }}</td>
                    <td>
                        {!! Form::open(['route'=> ['institutions.destroy', $inst->id], 'method'=>'DELETE' ]) !!}
                        {!! Form::submit('Remover') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
