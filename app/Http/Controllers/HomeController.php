<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       
    public function redirect()
    {
        if(Auth::id()){
            if(Auth::user()->user_type=='0'){
                return view('frontend.index');
            }else{
                return view('backend.admin.index');
            }

        }else{
            return back();
        }
    }
    
    public function index(){

        $doctors=Doctor::all();
        return view('frontend.index',compact('doctors'));
    }
}
