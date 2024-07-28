<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Payment;
use Illuminate\View\View;


class paymentController extends Controller
{
    public function index(): view
    {
        $payment = Payment::all();
        
        return view('payments.index')->with('payments', $payment);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'payments added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): view
    {
        $payment= Payment::find($id);
        return view('payments.show',['payments'=>$payment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $payment = Payment::find($id);
        return view('payments.edit')-> with('payments',$payment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Payment::find($id);
        $input = $request->all();
        $course->update($input);
        return redirect('payments')->with('flash_message', 'course updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'payments deleted');
    }
}
