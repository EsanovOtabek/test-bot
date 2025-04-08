<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects', compact('subjects'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);


        // Convert image to base64
        $icon = $request->file('icon');
        $iconData = base64_encode(file_get_contents($icon));

        // Store subject
        $data = Subject::create([
            'name' => $request->name,
            'icon' => $iconData,
        ]);


        return back()->with('success', 'Subject created successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
//        $subject = Subject::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Update icon if new file is uploaded
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconData = base64_encode(file_get_contents($icon));
            $subject->icon = $iconData;
        }

        $subject->name = $request->name;
        $subject->save();

        return back()->with('success', 'Subject updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return back()->with('success', "Fan muvaffaqiyatli o\'chirildi!");

    }
}
