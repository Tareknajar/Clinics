<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\previews;
use App\Models\doctors;
use App\Models\patients;


class PreviewsController extends Controller
{
    public function create(){   
        $doctor=doctors::all();
        $patients=patients::all();
        return view('/preview/create_preview',compact('patients','doctor'));
    }
    public function store(Request $request){
        $masseg=[
            'date'=>'Please enter a value',
            'time'=>'Please enter a value',
        ];
        $validator=Validator::make($request->all(),[
            'date'=>'Required|unique:previews,date',
            'time'=>'Required|unique:previews,time',
            'doctor_id'=>'Required|exists:doctors,id',
            'patient_id'=>'Required|exists:patients,id'

        ],$masseg);

        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $preview=new previews();
        $preview->date=$request->date;
        $preview->time=$request->time;
        $preview->doctor_id=$request->doctor_id;
        $preview->patient_id=$request->patient_id;
        $preview->save();
        return redirect()->back();
        
    }
    public function index(){
        $preview=previews::all();
        return view('preview/viewpreview',compact('preview'));
    }
    public function destore($id){
        $preview=previews::where('id',$id)->first();
        $preview->delete();
        return redirect()->back();
    }

    public function update($id){
        $preview=previews::where('id',$id)->first();
        $doctors=doctors::all();
        $patients=patients::all();
        return view('preview/update_preview',compact('doctors','preview','patients'));
    }
    public function edit(Request $request,$id){
        $masseg=[
            'date'=>'Please enter a value',
            'time'=>'Please enter a value',
        ];
        $validator=Validator::make($request->all(),[
            'date'=>'Required|unique:previews,date',
            'time'=>'Required|unique:previews,time',
            'doctor_id'=>'Required|exists:doctors,id',
            'patient_id'=>'Required|exists:patients,id'

        ],$masseg);

        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $preview=previews::where('id',$id)->first();
        $preview->date=$request->date;
        $preview->time=$request->time;
        $preview->doctor_id=$request->doctor_id;
        $preview->patient_id=$request->patient_id;
        $preview->save();
        return redirect()->back();
    }
}
