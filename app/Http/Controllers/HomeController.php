<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Contact;
use App\Models\Appointment;
use Illuminate\Cache\RateLimiting\Limit;
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
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {       
        $doctors=Doctor::all();
        $blogs = Blog::OrderBy('id','desc')->limit(3)->get();
        return view('frontend.index',compact('doctors','blogs'));
    }
       
    public function home()
    {
        return view('backend.admin.index');
    }

    public function doctor()
    {
        $doctors = Doctor::all();
        return view('frontend.allDoctors', compact('doctors'));
    }
    public function about(){
        $doctors = Doctor::all();
        return view('frontend.about', compact('doctors'));

    }

    public function contact(){
        return view('frontend.contact');
    }
    public function contactStore(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);
        return back()->with('success','Thanks! Your Message has been sent.');
    }

    public function blogs(){
        $blogs=Blog::all();
        return view('frontend.blog',compact('blogs'));
        

    }
    
    
    
}
