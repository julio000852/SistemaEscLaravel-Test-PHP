<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\School;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class adminController extends Controller
{
    public function list (){
        $school = School::get();

        $resT = DB::table('school')
        ->join('turma', 'school.id', '=', 'turma.id_school')
        ->select('turma.id', 'school.name_school', 'turma.status', 'turma.turn', 'turma.name_turm')
        ->get();

        $resP = DB::table('turma')
        ->join('professor', 'turma.id', '=', 'professor.id_turma')
        ->join('school', 'school.id', '=', 'turma.id_school')
        ->select('professor.id', 'school.name_school', 'turma.name_turm', 'professor.name_prof')
        ->get();


        return view('user.list', ['school' => $school, 'turma' => $resT, 'professor' => $resP]);

        /*Escolas*/
        
    }
    public function listSchool (){
        $school = School::get();
        return view('user.listSchool', ['school' => $school]);
    }
    public function addSchool(Request $request){
        return view('user.addSchool');
    }
    public function addSchoolbank(Request $request){
        $school = new School;

        $school->status = $request->status;
        $school->inep = $request->inep;
        $school->endereco = $request->endereco;
        $school->name_school = $request->name;
        
        $school->save();

        return Redirect::to('/list/listSchool')->with('msg', 'Escola Cadastrada Com Sucesso!');
    }
    public function editSchool($id){
        $school = School::findOrfail($id);

        return view('user.editSchool', array(
            'school'=>$school
        ));
    }
    public function updateSchool(Request $request, $id){
        /*
        $school = School::findOrfail($id)->update([
            'status'=>$data['status'],
            'inep'=>$data['inep'],
            'endereco'=>$data['endereco'],
            'name_school'=>$data['name']
        ]);
        */
        $school = School::find($id);

        $school->status = $request->status;
        $school->inep = $request->inep;
        $school->endereco = $request->endereco;
        $school->name_school = $request->name;

        $school->save();

        return Redirect::to('list/listSchool')->with('msg', 'Escola Alterada Com Sucesso!');
    }
    public function deleteSchool($id){
        $removeschool = School::destroy($id);

        return redirect()->route('list.school');
    }


    /*Turmas*/

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


    /*Professores*/

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
