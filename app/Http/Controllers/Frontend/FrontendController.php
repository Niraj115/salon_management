<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Customer;
use App\Models\Appointment;

class FrontendController extends Controller
{
    // Home page
    public function home()
    {
        $services = Service::where('status', 1)->latest()->take(3)->get();
        $staffs   = Staff::where('status', 1)->take(3)->get();

        return view('frontend.home', compact('services', 'staffs'));
    }

    // About page
    public function about()
    {
        return view('frontend.about');
    }

    // Services page
    public function services()
    {
        $services = Service::where('status', 1)->latest()->get();
        return view('frontend.services', compact('services'));
    }

    // Team page
    public function team()
    {
        $staffs = Staff::where('status', 1)->get();
        return view('frontend.team', compact('staffs'));
    }

    // Booking form page
    public function book()
    {
        return view('frontend.book', [
            'services' => Service::where('status', 1)->get(),
            'staffs'   => Staff::where('status', 1)->get(),
        ]);
    }

    // Store the booking
    public function storeBooking(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'phone'            => 'required|string|max:20',
            'service_id'       => 'required|exists:services,id',
            'staff_id'         => 'required|exists:staff,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        // Create or get existing customer
        $customer = Customer::firstOrCreate(
            ['phone' => $request->phone],
            ['name'  => $request->name]
        );

        // Create appointment
        $appointment = Appointment::create([
            'customer_id'      => $customer->id,
            'service_id'       => $request->service_id,
            'staff_id'         => $request->staff_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status'           => 'pending',
        ]);

        // Redirect to confirmation page
        return redirect()->route('frontend.booking.view', $appointment->id);
    }

    // Show confirmation page
    public function bookingView(Appointment $appointment)
    {
        // Load related models
        $appointment->load(['customer','service','staff']);

        return view('frontend.confirmation', compact('appointment'));
    }
}