<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Service-wise report
        $serviceReport = Appointment::select(
                'service_id',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('service_id')
            ->with('service')
            ->get();

        // Staff-wise report
        $staffReport = Appointment::select(
                'staff_id',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('staff_id')
            ->with('staff')
            ->get();

        // Monthly report
        $monthlyReport = Appointment::select(
                DB::raw('MONTH(appointment_date) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('month')
            ->get();

        return view(
            'backend.reports.index',
            compact('serviceReport', 'staffReport', 'monthlyReport')
        );
    }
}
