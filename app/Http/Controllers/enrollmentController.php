<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Enrollment;
use Illuminate\View\View;

class enrollmentController extends Controller
{
    public function index(): view
    {
        $enrollment = Enrollment::all();
        return view('enrollments.index')->with('enrollments', $enrollment);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request -> enroll_no;
        // return $request;
        $input = $request->all();
        Enrollment::create($input);
        // my technique
        // $store_data = new Enrollment;
        // $store_data -> enroll_no = $request -> enroll_no;
        // $store_data -> batch_id = $request -> batch_id;
        // $store_data -> student_id = $request -> student_id;
        // $store_data -> join_date = $request -> join_date;
        // $store_data -> save();
        return redirect('enrollments')->with('flash_message', 'enrollment added');
        // return "done";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): view
    {
        $enrollment= Enrollment::find($id);
        return view('enrollments.show')-> with('enrollments', $enrollment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $enrollment = Enrollment::find($id);
        return view('enrollments.edit')-> with('enrollments',$enrollment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollment = Enrollment::find($id);
        $input = $request->all();
        $enrollment->update($input);
        return redirect('enrollments')->with('flash_message', 'enrollment updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'enrollment deleted');
    }


}
