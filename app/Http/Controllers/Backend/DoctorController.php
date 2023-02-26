<?php

namespace App\Http\Controllers\Backend;

use App\Models\Doctor;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $activeDoctors=Doctor::where('status','publish')->get();
        $draftDoctors=Doctor::where('status','draft')->get();
        $trashDoctors= Doctor::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.doctor.index', compact('activeDoctors', 'draftDoctors', 'trashDoctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'doctor_id' => 'required',
            'photo' => 'required|max:2000|mimes:png,jpg,jpeg',
        ]);
        if ($photo) {
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/doctor/' . $photoName));
        }
        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'doctor_id' => $request->doctor_id,
            'photo' => $photoName,
        ]);
        return back()->with('success', 'Doctor Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('backend.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $photo = $request->file('photo');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'doctor_id' => 'required',
            'photo' => 'required|max:2000|mimes:png,jpg,jpeg',
        ]);
        if ($photo) {
            $path = public_path('storage/doctor/' . $doctor->photo);
            if(file_exists($path)){
                unlink($path);
            }
            $photoName=uniqid().'.'. $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/doctor/' .$photoName));
        }
        $doctor->name=$request->name;
        $doctor->email=$request->email;
        $doctor->designation=$request->designation;
        $doctor->phone=$request->phone;
        $doctor->doctor_id=$request->doctor_id;
        $doctor->photo=$photoName;
        $doctor->save();
        return redirect(route('backend.doctor.index'))->with('success','Doctor info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->status == 'draft';
        $doctor->save();
        $doctor->delete();
        return back()->with('success','Doctor Info Trashed');
    }

    public function status(Doctor $doctor){
        if($doctor->status=='publish'){
            $doctor->status='draft';
            $doctor->save();
        }else{
            $doctor->status = 'publish';
            $doctor->save();
        }
        return back()->with('success', $doctor->status == 'publish' ? 'Doctor info Published' : 'Doctor info Drafted');
    }
    public function reStore($id){
        $doctor= Doctor::onlyTrashed()->find($id);
        $doctor->restore();
        return back()->with('success', 'Doctor Restored!');

    }
    public function delete($id){
        $doctor=Doctor::onlyTrashed()->find($id);
        $doctor->forceDelete();
        return back()->with('success','Doctor Data Deleted!');
    }
}
