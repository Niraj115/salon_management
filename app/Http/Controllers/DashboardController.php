<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Appointment;
use App\Models\Staff;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total stats
        $totalServices = Service::count();
        $totalStaff = Staff::count();
        $totalAppointments = Appointment::count();

        $todayAppointments = Appointment::whereDate(
            'appointment_date',
            Carbon::today()
        )->count();

        // Recent Appointments - latest 5 by appointment_date
        $recentAppointments = Appointment::with(['service', 'staff', 'customer'])
                                ->orderBy('appointment_date', 'desc')
                                ->take(5)
                                ->get();

        // Monthly Appointments Chart Data
        $monthlyData = Appointment::select(
                            DB::raw('MONTH(appointment_date) as month'),
                            DB::raw('COUNT(*) as total')
                        )
                        ->whereYear('appointment_date', Carbon::now()->year)
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();

        // Prepare labels and data for charts
        $months = [];
        $appointmentsData = [];

        // Initialize months with 0 in case some months have no appointments
        for ($m = 1; $m <= 12; $m++) {
            $months[] = Carbon::create()->month($m)->format('M');
            $appointmentsData[$m] = 0;
        }

        // Fill actual data
        foreach ($monthlyData as $data) {
            $appointmentsData[$data->month] = $data->total;
        }

        // Re-index appointmentsData to match $months array
        $appointmentsData = array_values($appointmentsData);

        // Status Chart Data (optional)
        $statusCounts = Appointment::select('status', DB::raw('COUNT(*) as total'))
                            ->groupBy('status')
                            ->pluck('total', 'status');

        return view('backend.dashboard.index', compact(
            'totalServices',
            'totalStaff',
            'totalAppointments',
            'todayAppointments',
            'recentAppointments',
            'months',
            'appointmentsData',
            'statusCounts'
        ));
    }
}