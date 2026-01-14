<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();
        return view('backend.staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('backend.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'role' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        Staff::create($data);

        return redirect()->route('staff.index')->with('success', 'Staff added successfully.');
    }

    public function edit(Staff $staff)
    {
        return view('backend.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'role' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        $staff->update($data);

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
