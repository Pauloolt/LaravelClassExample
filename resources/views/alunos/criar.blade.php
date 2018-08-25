@extends('layouts.app')
@section('content')
  <h1>Add Student</h1>
  <form action="{{route('alunos.store')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label>Nome</label>
      <input type="text" name="nome" class="form-control">
    </div>
    <div class="form-group">
      <label>Matricula<span class="fi-trash"></span></label>
      <input type="text" name="matricula" class="form-control">
    </div>
    <input type="submit"  value="submit" class="btn btn-primary">
  </form>

@endsection
