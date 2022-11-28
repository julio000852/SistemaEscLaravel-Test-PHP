<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfController extends Controller
{
    public function listProf(){
        $res = DB::table('turma')
        ->join('professor', 'turma.id', '=', 'professor.id_turma')
        ->join('school', 'school.id', '=', 'turma.id_school')
        ->select('professor.id', 'school.name_school', 'turma.name_turm', 'professor.name_prof')
        ->get();

        return view('user.listProf', ['professor' => $res]);
    }
    public function addProf(){
        $res = DB::table('school')
        ->join('turma', 'school.id', '=', 'turma.id_school')
        ->select('*')
        ->get();

        return view('user.addProf', ['school' => $res]);
    }
    public function addProfbank( Request $request ){
        $prof = new Professor();

        $prof->id_turma = $request->turmProf[0];
        $prof->name_prof = $request->nome;
        
        $prof->save();

        return Redirect::to('/list/listProf')->with('msg', 'Professor Cadastrada Com Sucesso!');
    }
    public function editProf($id){
        $prof = Professor::findOrfail($id);

        $res = DB::table('school')
        ->join('turma', 'school.id', '=', 'turma.id_school')
        ->select('*')
        ->get();

        return view('user.editProf', array(
            'professor'=>$prof, 'school'=>$res));
    }
    public function updateProf(Request $request, $id){
        $prof = Professor::find($id);

        $prof->id_turma = $request->turmProf[0];
        $prof->name_prof = $request->name;

        $prof->save();

        return Redirect::to('list/listProf')->with('msg', 'Professor Alterada Com Sucesso!');
    }
    public function deleteProf($id){
        $removeprof = Professor::destroy($id);

        return redirect()->route('list.prof');
    }
}
