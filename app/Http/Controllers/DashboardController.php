<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Appointment;
use App\Models\Staff;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalStaff = Staff::count();
        $totalAppointments = Appointment::count();

        $todayAppointments = Appointment::whereDate(
            'appointment_date',
            Carbon::today()
        )->count();

        return view('backend.dashboard.index', compact(
            'totalServices',
            'totalStaff',
            'totalAppointments',
            'todayAppointments'
        ));
    }
}
