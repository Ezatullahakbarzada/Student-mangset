<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\course;
use Illuminate\View\View;


class coursecontroller extends Controller
{
    
    public function index(): view
    {
        $courses = course::all();
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        course::create($input);
        return redirect('courses')->with('flash_message', 'courses added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): view
    {
        $course= course::find($id);
        return view('courses.show', ['courses'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $course = course::find($id);
        return view('courses.edit')-> with('courses',$course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $course = course::find($id);
        $input = $request->all();
        $course->update($input);
        return redirect('courses')->with('flash_message', 'course updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        course::destroy($id);
        return redirect('courses')->with('flash_message', 'courses deleted');
    }
}

