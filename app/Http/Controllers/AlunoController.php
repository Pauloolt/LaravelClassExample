<?php

// namespace App;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Input;
use DB;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // use App;
      $alunos = \App\Aluno::orderBy('created_at', 'desc')->paginate(6);
      return View('alunos.index')->with('alunos', $alunos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return View('alunos.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'nome' => 'required|min:5|max:255|string',
        'matricula'  => 'required|numeric|digits:14|unique:alunos',
      ]);

      $new = new \App\Aluno;
      $new->nome = $request->input('nome');
      $new->matricula = $request->input('matricula');
      $new->save();

      // DB::insert('insert into alunos (nome, matricula) values (?, ?)', [$nome, $mat]);
      // DB::table('alunos')
      // ->insert(['nome' => $nome, 'matricula' => $mat]);

      return redirect('/alunos')->with('success', 'Student adeed');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // $aluno = DB::table('alunos')
      // ->where('id', $id)
      // ->first();

      $aluno = \App\Aluno::find($id);


      if (isset($aluno)) {
        return View('alunos.mostrar')->with('aluno', $aluno);
      }
      return redirect() ->to (route('alunos.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $res = DB::table('alunos')
      // ->where('id', $id)
      // ->first();

      $aluno = \App\Aluno::find($id);

      if (isset($aluno)) {
        return view('alunos.editar')->with('aluno', $aluno);
      }
      return redirect() ->to (route('alunos.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nome' => 'required|min:5|max:255|string',
        'matricula'  => 'required|numeric|digits:14|unique:alunos,matricula,'.$id,
      ]);

      $aluno = \App\Aluno::find($id);
      $aluno->nome = $request->input('nome');
      $aluno->matricula = $request->input('matricula');
      $aluno->save();

      return redirect() ->to (route('alunos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $aluno = \App\Aluno::find($id);
      $aluno->delete();
      return redirect() ->to (route('alunos.index'));
    }
}
