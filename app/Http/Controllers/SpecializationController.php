<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\specialization;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class SpecializationController extends Controller
{
    public function index(){
        $specializations=specialization::all();
        return view('specialization/viewspecialization',compact('specializations'));
    }
    public function destore($id){
        $specializations=specialization::where('id',$id)->first();
        $specializations->delete();
        return redirect()->back();
    }
    public function create(){
        return view('specialization/create_specizaliztion');
    }
    public function store(Request $request){
        $masseg=[
            'name_specialization'=>'Please enter a value'
        ];

        $validator=Validator::make($request->all(),[
            'name_specialization'=>'required|string'
        ],$masseg);
        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $specializations=new specialization();
        $specializations->name_specialization=$request->name_specialization;
        $specializations->save();
        return redirect()->back();
    }
    public function update($id){
        $specializations=specialization::where('id',$id)->first();
        return view('specialization/update_specizaliztion',compact('specializations'));
    }
    public function edit(Request $request,$id){
        $masseg=[
            'name_specialization'=>'Please enter a value'
        ];
        $validator=Validator::make($request->all(),[
            'name_specialization'=>'Required|string'
        ],$masseg);
        if($validator->fails()){
            session()->flash('errors',$validator->messages());
            return back()->withInput();
        }
        $specializations=specialization::where('id',$id)->first();
        $specializations->name_specialization=$request->name_specialization;
        $specializations->save();
        return redirect()->back();

    }
}
