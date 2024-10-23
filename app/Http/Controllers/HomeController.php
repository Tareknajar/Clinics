<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use App\Models\medical_conditions;
use App\Models\patients;
use App\Models\previews;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $patient=patients::count();
        $doctor=doctors::count();
        $conditions=medical_conditions::count();
        $previews=previews::count();

        return view('home',compact('patient','doctor','conditions','previews'));

    }
}
