<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

use App\Models\Appointment;

use App\Models\Doctor;
use App\Notifications\sendEmailNotification;

use Illuminate\Support\Facades\Notification;



class AdminController extends Controller
{

    public function addview()
    {

        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {

        $doctor = new doctor;

        $image = $request->file;

        $imagename = time() . '.' . $image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->image = $imagename;

        $doctor->name = $request->name;

        $doctor->phone = $request->phone;

        $doctor->room = $request->room;

        $doctor->specialite = $request->specialite;

        $doctor->save();


        return redirect()->back()->with('message', 'doctor added');
    }

    public function show_appointment()
    {

        $appointment = Appointment::all();

        return view('admin.show_appointment', compact('appointment'));
    }

    public function approved($id)
    {

        $data = Appointment::find($id);

        $data->status = 'Approved';

        $data->save();

        return redirect()->back();
    }

    public function canceled($id)
    {

        $data = Appointment::find($id);

        $data->status = 'Canceled';

        $data->save();

        return redirect()->back();
    }


    public function show_doctors()
    {
        $doctor = doctor::all();

        return view('admin.show_doctors', compact('doctor'));
    }


    public function delete($id)
    {

        $doctor = doctor::find($id);

        $doctor->delete();

        return redirect()->back();
    }

    public function update($id)
    {


        $doctor = doctor::find($id);

        return view('admin.update_doctor', compact('doctor'));
    }


    public function update_doctor(Request $request, $id)
    {

        $doctor = doctor::find($id);

        $doctor->name = $request->name;

        $doctor->phone = $request->phone;

        $doctor->room = $request->room;

        $doctor->specialite = $request->specialite;

        $image = $request->file;

        if ($image) {

            $imagename = time() . '.' . $image->getClientoriginalExtension();

            $request->file->move('doctorimage', $imagename);

            $doctor->image = $imagename;
        }

        $doctor->save();

        return redirect()->back()->with('message', 'doctor uploaded');
    }


    public function email($id)
    {

        $data = Appointment::find($id);

        return view('admin.send_email', compact('data'));
    }

    public function send_email(Request $request, $id)
    {

        $data = Appointment::find($id);

        $details = [

            'greeting' => $request->greeting,

            'body' => $request->body,

            'actionText' => $request->actionText,

            'actionURL' => $request->actionURL,

            'endpart' => $request->endpart,
        ];

        Notification::send($data, new sendEmailNotification($details));

        return redirect()->back()->with('message', 'Email sent');
    }
}
