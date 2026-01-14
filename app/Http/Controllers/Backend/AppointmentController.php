<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Customer;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['customer','service','staff'])->get();
        return view('backend.appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('backend.appointments.create', [
            'customers' => Customer::all(),
            'services'  => Service::all(),
            'staffs'    => Staff::where('status',1)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'required|exists:staff,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'customer_id' => $request->customer_id,
            'service_id' => $request->service_id,
            'staff_id' => $request->staff_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
        ]);

        return redirect()->route('appointments.index')
            ->with('success','Appointment created successfully');
    }

    public function show(Appointment $appointment)
    {
        return view('backend.appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        return view('backend.appointments.edit', [
            'appointment' => $appointment,
            'customers' => Customer::all(),
            'services' => Service::all(),
            'staffs' => Staff::where('status',1)->get(),
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'required|exists:staff,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required',
        ]);

        $appointment->update([
            'customer_id' => $request->customer_id,
            'service_id' => $request->service_id,
            'staff_id' => $request->staff_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
        ]);

        return redirect()->route('appointments.index')
            ->with('success','Appointment updated successfully');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success','Appointment deleted');
    }

    public function confirm(Appointment $appointment)
    {
        $appointment->update(['status'=>'confirmed']);
        return back();
    }

    public function cancel(Appointment $appointment)
    {
        $appointment->update(['status'=>'cancelled']);
        return back();
    }
}
