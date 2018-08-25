@extends('layouts.app')
@section('content')
  <div class="card card-body bg-ligh">
    <h1>{{$aluno->nome}}</h1>
    <div class="">
      <label><h4>Id:</h4></label>
      {{$aluno->id}}
    </div>
    <div class="">
      <label><h4>Matricula:</h4></label>
      {{$aluno->matricula}}
    </div>
  </div>
@endsection
