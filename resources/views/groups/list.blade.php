<div class="conteiner-table">

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
            @foreach ($groups_list as $group)
            <tr>
                <td>{{ $group->name }}</td>
                <td>{{ $group->institutions->name }}</td>
                <td>{{ $group->user->name }}</td>
                <td>
                    {!! Form::open(['route'=> ['institutions.destroy', $group->id], 'method'=>'DELETE' ]) !!}
                    {!! Form::submit('Remover') !!}
                    {!! Form::close() !!}
                    <a href="{{ route('group.show', $group->id) }}">Detalhes</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
