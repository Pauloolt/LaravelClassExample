@extends('layouts.app')
@section('content')
  <h1>Students</h1>

  <div class="">

  </div>

  @foreach ($alunos as $aluno)
    <div class="card card-body bg-ligh">
      <h3>{{$aluno->nome}}</h3>
      <div class="row">
        <a href="{{route('alunos.show', [$aluno->id])}}" class="btn btn-info m-2 m-y-0">Show</a>
        <a href="{{route('alunos.edit', [$aluno->id])}}" class="btn btn-secondary m-2 m-y-0">Edit</a>
        <form action="{{route('alunos.destroy', [$aluno->id])}}" method="post" class="">
          @method('DELETE')
          @csrf
          <input type="submit" name="" value="Remove" class="btn btn-danger m-2 m-y-0">
        </form>
      </div>
    </div>
  @endforeach

  <a href="{{route('alunos.create')}}" class="btn btn-primary float-right m-2">Novo aluno</a>
  <div class="m-2">
    {{ $alunos->links() }}
  </div>

@endsection
