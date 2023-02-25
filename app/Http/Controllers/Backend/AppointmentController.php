<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('backend.appoinment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.appointment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'nullable',
            'phone'=>'required|numeric',
            'doctor'=>'required',
            'date'=>'required',
            'message'=>'nullable|max:500',
            'user_id'=>'nullable',
            'status'=>'processing',

        ]);
        Appointment::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'doctor'=>$request->doctor,
            'date'=>$request->date,
            'message'=>$request->message,
            'user_id'=>Auth::user()->id,
            'status'=> 'processing',
        ]);
        return back()->with('success','Appoinment Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {   
        
        return view('backend.appoinment.edit',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'required|numeric',
            'doctor' => 'required',
            'date' => 'required',
            'message' => 'nullable|max:500',
            'user_id' => 'nullable',
            'status' => 'processing',

        ]);
        $appointment->name=$request->name;
        $appointment->email=$request->email;
        $appointment->phone=$request->phone;
        $appointment->doctor=$request->doctor;
        $appointment->message=$request->message;
        $appointment->user_id=$request->user_id;
        $appointment->status='processing';

        $appointment->save();
        return redirect(route('appointment.index'))->with('success','Appoinment Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        /* $appointment=Appointment::find($appointment);
        $appointment->status='Canceled';
        $appointment->save();
        return back()->with('success','Appoinment Deleted'); */
    }


    public function myappointment()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $appoints = Appointment::where('user_id', $userid)->get();
            return view('backend.appoinment.myappointment', compact('appoints'));
        } else {
            return back();
        }
    }

    public function cancel_appointment($id)
    {
        $appoint = Appointment::find($id);
        $appoint->status = 'Canceled';
        $appoint->save();
        return back()->with('success', 'Appoinment Canceled!');
    }
    public function delete_appointment($id)
    {
        $appoint = Appointment::find($id);
        $appoint->delete();
        return back()->with('success', 'Appoinment Deleted!');
    }

    public function approve_appointment($id){
        $appoint = Appointment::find($id);
        $appoint->status='Approved';
        $appoint->save();

        return back()->with('success','Appoinment Approved!');
    }
}
