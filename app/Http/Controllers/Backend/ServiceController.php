<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('backend.services.index', compact('services'));
    }

    public function create()
    {
        return view('backend.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'duration' => 'required|numeric',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png',
            'status'   => 'required|boolean',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'duration'    => $request->duration,
            'description' => $request->description,
            'image'       => $imagePath,
            'status'      => $request->status,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'duration' => 'required|numeric',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png',
            'status'   => 'required|boolean',
        ]);

        $imagePath = $service->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        $service->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'duration'    => $request->duration,
            'description' => $request->description,
            'image'       => $imagePath,
            'status'      => $request->status,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service deleted');
    }
}
