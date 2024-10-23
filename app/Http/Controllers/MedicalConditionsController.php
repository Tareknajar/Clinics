<?php

namespace App\Http\Controllers;
use App\Models\medical_conditions;
use App\Models\patients;
use App\Models\previews;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class MedicalConditionsController extends Controller
{
    public function index(){
        $conditions=medical_conditions::all();
        return view('condition/viewcondition',compact('conditions'));
    }

    public function create(){   
        $patients=patients::all();
        return view('/condition/create_condition',compact('patients'));
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'the_condition'=>'Required',
            'Tests'=>'Required',
            'patients_id'=>'Required|exists:patients,id',

        ]);

        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $conditions=new medical_conditions();
        $conditions->the_condition=$request->the_condition;
        $conditions->Tests=$request->Tests;
        $conditions->patients_id=$request->patients_id;
        $conditions->save();
        return redirect()->back();
        
    }
    public function edit(Request $request,$id){
        $validator=Validator::make($request->all(),[
            'the_condition'=>'Required',
            'Tests'=>'Required',
            'patients_id'=>'Required|exists:patients,id',

        ]);

        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $conditions=medical_conditions::where('id',$id)->first();
        $conditions->the_condition=$request->the_condition;
        $conditions->Tests=$request->Tests;
        $conditions->patients_id=$request->patients_id;
        $conditions->save();
        return redirect()->back();
        
    }

    public function destore($id){
        $conditions=medical_conditions::where('id',$id)->first();
        $conditions->delete();
        return redirect()->back();
    }
    public function update($id){
        $patients=patients::all();
        $conditions=medical_conditions::where('id',$id)->first();
        return view('condition/update_condition',compact('patients','conditions'));

    }
}
