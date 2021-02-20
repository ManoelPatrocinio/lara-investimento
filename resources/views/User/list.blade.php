<div class="conteiner-table">

    <div class="form-title"><h2>Usuários Cadastros </h2></div>
    <table>
        <thead>
            <td>Nome</td>
            <td>Cpf</td>
            <td>Contato</td>
            <td>Nascimento</td>
            <td>E-mail</td>
            <td>Status</td>
            <td>Permissão</td>
            <td>Menu</td>
        </thead>
        <tbody>

            @foreach($user_list as $user)
            <tr>
                <td>{{ $user->name}}</td>
                <td>{{ $user->formatted_cpf}}</td>
                <td>{{ $user->formatted_phone}}</td>
                <td>{{ $user->formatted_birth}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->status}}</td>
                <td>{{ $user->permission}}</td>
                <td>
                    {!! Form::open(['route'=> ['user.destroy', $user->id], 'method'=>'DELETE' ]) !!}
                    {!! Form::submit('Remover') !!}
                    {!! Form::close() !!}

                    <a href="{{ route('user.edit',$user->id) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
