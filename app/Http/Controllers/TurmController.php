<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TurmController extends Controller
{
    public function listturm(){
        $res = DB::table('school')
        ->join('turma', 'school.id', '=', 'turma.id_school')
        ->select('turma.id', 'school.name_school', 'turma.status', 'turma.turn', 'turma.name_turm')
        ->get();


        return view('user.listTurm', ['turma' => $res]);
    }

    public function addTurm (){
        $school = School::get();
        return view('user.addTurm', ['school' => $school]);
    }
    public function addTurmbank( Request $request ){
        $turma = new Turma();

        $turma->id_school = $request->escolaTurm[0];
        $turma->status = $request->status;
        $turma->turn = $request->turn;
        $turma->name_turm = $request->nome;


        $turma->save();

        return Redirect::to('/list/listturm')->with('msg', 'Escola Cadastrada Com Sucesso!');
    }
    public function editTurm($id){
        $turm = Turma::findOrfail($id);
        $school = School::get();

        return view('user.editTurm', array(
            'turma'=>$turm, 'school'=>$school));
    }
    public function updateTurm(Request $request, $id){
        $turm = Turma::find($id);

        $turm->id_school = $request->escolaTurm[0];
        $turm->status = $request->status;
        $turm->turn = $request->turn;
        $turm->name_turm = $request->name;

        $turm->save();

        return Redirect::to('list/listturm')->with('msg', 'Turma Alterada Com Sucesso!');
    }

    public function deleteTurm($id){
        $removeturm = Turma::destroy($id);

        return redirect()->route('list.turm');
    }
}
