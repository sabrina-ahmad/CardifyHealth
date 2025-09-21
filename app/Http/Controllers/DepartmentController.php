<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('name')
            ->get();

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:departments,name',
            'description' => 'required|string',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        Department::create($validated);

        return redirect()->route('departments.index')
            ->with('success', 'Department added successfully!');
    }

    public function show($id)
    {
        $department = Department::with('doctors')
            ->findOrFail($id);

        return view('departments.show', compact('department'));
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:departments,name,' . $id,
            'description' => 'required|string'
        ]);

        $department = Department::findOrFail($id);
        $department->update($validated);

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully!');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        // Check if department has doctors with pending appointments
        if ($department->doctors()->whereHas('appointments', function ($query) {
            $query->where('status', 'pending');
        })->exists()) {
            return back()->withErrors([
                'error' => 'Cannot delete department with doctors having pending appointments.'
            ]);
        }

        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Department deleted successfully!');
    }
}
