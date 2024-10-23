<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\ratings;
use App\Models\patients;
use App\Models\doctors;

use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function index(){
        $rating=ratings::all();
        return view('rating/viewrating',compact('rating'));
    }

    public function create(){
        $doctors=doctors::all();
        $patients=patients::all();
        return view('rating/create_rating',compact('doctors','patients'));
    }

    public function store(Request $request){
        $masseg=[
            'reate'=>'Rating should be between 1 and 10.',
            'comment'=>'Please enter a value',
        ];
        $validator=Validator::make($request->all(),[
            'reate'=>'Required|regex:/^[1-9]$/',
            'comment'=>'Required|string',
            'patient'=>'Required|exists:doctors,id',
            'doctor'=>'Required|exists:patients,id'

        ],$masseg);
        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
           }
        $rating=new ratings();
        $rating->reate=$request->reate;
        $rating->comment=$request->comment;
        $rating->patient_id=$request->patient;
        $rating->doctor_id=$request->doctor;
        $rating->save();
        return redirect()->back();

    }
    public function destore($id){
        $rating=ratings::where('id',$id)->first();
        $rating->delete();
        return redirect()->back();
    }
    public function update($id){
        $doctors=doctors::all();
        $patients=patients::all();
        $rating=ratings::where('id',$id)->first();
        return view('rating/update_rating',compact('doctors','patients','rating'));

    }
    public function edit(Request $request,$id){
        $masseg=[
            'reate'=>'Rating should be between 1 and 10.',
            'comment'=>'Please enter a value',
        ];
        $validator=Validator::make($request->all(),[
            'reate'=>'Required|regex:/^[1-9]$/',
            'comment'=>'Required|string',
            'patient'=>'Required|exists:doctors,id',
            'doctor'=>'Required|exists:patients,id'

        ],$masseg);
        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
           }
        $rating=ratings::where('id',$id)->first();
        $rating->reate=$request->reate;
        $rating->comment=$request->comment;
        $rating->patient_id=$request->patient;
        $rating->doctor_id=$request->doctor;
        $rating->save();
        return redirect()->back();

    }
    
}
