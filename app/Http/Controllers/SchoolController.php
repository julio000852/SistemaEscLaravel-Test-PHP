<?php

namespace App\Http\Controllers;
use App\Models\School;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
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
}
