<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Batch;
use Illuminate\View\View;
class BatchController extends Controller
{

    public function index(): View
    {
        $batches = Batch::all();
        return view('batches.index',['batches'=>$batches]);
    }

    public function create(): View
    {
        return view('batches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Batch::create($input);
        return redirect('batches')->with('flash_message', 'batches added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $Batch= Batch::find($id);
        return view('batches.show',['batches'=>$Batch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $Batch = Batch::find($id);
        return view('batches.edit')-> with('batches',$Batch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $Batch = Batch::find($id);
        $input = $request->all();
        $Batch->update($input);
        return redirect('batches')->with('flash_message', 'batch updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        batch::destroy($id);
        return redirect('batches')->with('flash_message', 'batches deleted');
    }
}
   