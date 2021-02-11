@extends('templates.master')

@section('conteudo-view')

<div class="form-title"><h2>Listagem por Instituição</h2></div>

@include('groups.list', ['groups_list' => $institutions->groups])

@endsection
