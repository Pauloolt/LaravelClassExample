@extends('layouts.app')
@section('content')
  <h1>Edit</h1>
  <form action="{{route('alunos.update', [$aluno->id])}}" method="Post">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <div class="form-group">
      <label>Nome:</label>
      <input type="text" name="nome" value="{{$aluno->nome}}" class="form-control">
    </div>
    <div class="form-group">
      <label>Matricula:</label>
      <input type="text" name="matricula" value="{{$aluno->matricula}}" class="form-control">
    </div>
    <input type="submit"  value="submit" class="btn btn-primary">
  </form>

@endsection
