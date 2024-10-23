<?php

namespace App\Http\Controllers;
use App\Models\specialization;
use App\Models\doctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorsController extends Controller
{
    public function index(){
        $doctors=doctors::all();
        return view('doctor/viewdoctor',compact('doctors'));
    }
    public function create(){   
        $specializations=specialization::all();
        return view('/doctor/create_doctor',compact('specializations'));
    }
    public function store(Request $request){
        $masseg=[
            'name'=>'Please enter a value',
            'age'=>'Please enter a value',
            'phone'=>'You must enter 10 numbers.',
        ];
        $validator=Validator::make($request->all(),[
            'name'=>'Required|string',
            'age'=>'Required|integer',
            'phone'=>'Required|string|digits:10',
            'Specialization_id'=>'Required|exists:specializations,id'

        ],$masseg);

        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $doctors=new doctors();
        $doctors->name=$request->name;
        $doctors->age=$request->age;
        $doctors->phone=$request->phone;
        $doctors->Specialization_id=$request->Specialization_id;
        $doctors->save();
        return redirect()->back();
        
    }
    public function update($id){
        $doctors=doctors::where('id',$id)->first();
        $specializations=specialization::all();
        return view('doctor/update_doctor',compact('doctors','specializations'));
    }
    public function edit(Request $request,$id){
        $masseg=[
            'name'=>'Please enter a value',
            'age'=>'Please enter a value',
            'phone'=>'You must enter 10 numbers.',
        ];
        $validator=Validator::make($request->all(),[
            'name'=>'Required|string',
            'age'=>'Required|integer',
            'phone'=>'Required|string|digits:10',
            'Specialization_id'=>'Required|exists:specializations,id'

        ]);
        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $doctors=doctors::where('id',$id)->first();
        $doctors->name=$request->name;
        $doctors->age=$request->age;
        $doctors->phone=$request->phone;
        $doctors->Specialization_id=$request->Specialization_id;
        $doctors->save();
        return redirect()->back();
    }
    public function destore($id){
        $doctors=doctors::where('id',$id)->first();
        $doctors->delete();
        return redirect()->back();
    }
}
