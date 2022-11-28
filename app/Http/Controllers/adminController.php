<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Support\Facades\DB;

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
        
    }
}
