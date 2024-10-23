<?php

namespace App\Http\Controllers;
use App\Models\patients;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(){
        $patients=patients::all();
        return view('patient/viewPatient',compact('patients'));
    }
    public function create(){
        $patients=patients::all();
        return view('patient/create_patient',compact('patients'));
    }
    public function store(Request $request){
        $masseg=[
            'name'=>'Please enter a value',
            'age'=>'Please enter a value',
            'phone'=>'You must enter 10 numbers.',
            'Gender'=>'Invalid value'
        ];
        $validator=Validator::make($request->all(),[
            'name'=>'Required|string',
            'age'=>'Required|integer',
            'phone'=>'Required|string|digits:10',
            'Gender'=>'Required|in:Female,male'
        ],$masseg);
        if($validator->fails()){
         session()->flash('errors',$validator->messages());
         return back()->withInput();
        }
        $patients= new patients();
        $patients->name=$request->name;
        $patients->age=$request->age;
        $patients->phone=$request->phone;
        $patients->Gender=$request->Gender;
        $patients->save();
        return redirect()->back();
    }

    public function update($id){
        $patients=patients::where('id',$id)->first();
        $genders=patients::all();
        return view('patient/update_Patient',compact('patients','genders'));
    }
    public function edit(Request $request,$id){
        $masseg=[
            'name'=>'Please enter a value',
            'age'=>'Please enter a value',
            'phone'=>'You must enter 10 numbers.',
            'Gender'=>'Invalid value'
        ];
        $validator=Validator::make($request->all(),[
            'name'=>'Required|string',
            'age'=>'Required|integer',
            'phone'=>'Required|string|digits:10',
            'Gender'=>'Required|in:Female,male'
        ],$masseg);
        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $doctors=patients::where('id',$id)->first();
        $doctors->name=$request->name;
        $doctors->age=$request->age;
        $doctors->phone=$request->phone;
        $doctors->Gender=$request->Gender;
        $doctors->save();
        return redirect()->back();
    }
    public function destore($id){
        $doctors=patients::where('id',$id)->first();
        $doctors->delete();
        return redirect()->back();
    }
    
}
