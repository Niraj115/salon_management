@extends('backend.layouts.app')

@section('content')

<!-- Header -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">
        Dashboard Overview
    </h1>
    <p class="text-gray-500 text-sm">
        Welcome back! Here is your salon summary.
    </p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-pink-500">
        <p class="text-gray-500 text-sm">Total Services</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalServices }}</h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-blue-500">
        <p class="text-gray-500 text-sm">Total Staff</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalStaff }}</h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-green-500">
        <p class="text-gray-500 text-sm">Total Appointments</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalAppointments }}</h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-yellow-500">
        <p class="text-gray-500 text-sm">Today's Appointments</p>
        <h2 class="text-3xl font-bold mt-2">{{ $todayAppointments }}</h2>
    </div>

</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">

    <!-- Line Chart: Monthly Trend -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold mb-4">Monthly Appointments Trend</h3>
        <canvas id="lineChart"></canvas>
    </div>

    <!-- Doughnut Chart: Distribution -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold mb-4">Monthly Appointments Distribution</h3>
        <canvas id="doughnutChart"></canvas>
    </div>

</div>

<!-- Recent Appointments -->
<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-lg font-semibold mb-4">Recent Appointments</h3>

    <table class="w-full text-sm">
        <thead>
            <tr class="text-left text-gray-500 border-b">
                <th class="pb-2">Customer</th>
                <th class="pb-2">Service</th>
                <th class="pb-2">Staff</th>
                <th class="pb-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentAppointments as $appointment)
            <tr class="border-b">
                <td class="py-2">{{ $appointment->customer->name ?? 'N/A' }}</td>
                <td>{{ $appointment->service->name ?? 'N/A' }}</td>
                <td>{{ $appointment->staff->name ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<script>
    // Generate dynamic colors for all months
    function generateColors(count) {
        const colors = [];
        const hueStep = Math.floor(360 / count);
        for (let i = 0; i < count; i++) {
            const hue = i * hueStep;
            colors.push(`hsl(${hue}, 70%, 60%)`);
        }
        return colors;
    }

    const monthColors = generateColors({!! count($months) !!});

    // Line Chart: Trend with dynamic point colors
    const lineCtx = document.getElementById('lineChart');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Appointments',
                data: {!! json_encode($appointmentsData) !!},
                borderColor: 'rgba(59, 130, 246, 1)', // line color
                backgroundColor: 'rgba(59, 130, 246, 0.2)', // fill under line
                fill: true,
                tension: 0.4,
                pointBackgroundColor: monthColors, // dynamic point colors
                pointBorderColor: '#fff',
                pointRadius: 6,
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.raw + ' appointments';
                        }
                    }
                }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } },
                x: { title: { display: true, text: 'Months' } }
            }
        }
    });

    // Doughnut Chart: Dynamic colors
    const doughnutCtx = document.getElementById('doughnutChart');
    new Chart(doughnutCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Appointments',
                data: {!! json_encode($appointmentsData) !!},
                backgroundColor: monthColors, // same colors as line chart points
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw + ' appointments';
                        }
                    }
                }
            }
        }
    });
</script>
@endsection