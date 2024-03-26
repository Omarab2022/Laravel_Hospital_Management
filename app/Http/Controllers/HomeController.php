<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

use App\Models\Doctor;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            if (Auth::user()->usertype == '0') {

                $doctor = doctor::all();

                return view('user.home', compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {

        if (Auth::id()) {
            return redirect('home');
        } else {

            $doctor = doctor::all();

            return view('user.home', compact('doctor'));
        }
    }


    public function appointment(Request $request)
    {

        $appointment = new Appointment;

        $appointment->name = $request->name;

        $appointment->phone = $request->phone;

        $appointment->email = $request->email;

        $appointment->doctor = $request->doctor;

        $appointment->date = $request->date;

        $appointment->message = $request->message;

        $appointment->status = 'In Progress';

        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();

        return redirect()->back()->with('message', 'appointment added');
    }


    public function myappointment()
    {


        if (Auth::id()) {

            $userid = Auth::user()->id;
            $appointment = appointment::where('user_id', $userid)->get();

            return view('user.my_appointment', compact('appointment'));
        } else {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id)
    {
        $data = appointment::find($id);

        $data->delete();

        return redirect()->back();
    }
}
