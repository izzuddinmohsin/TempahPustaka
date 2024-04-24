<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::with('users', 'room')->orderBy('created_at', 'desc')->get();

        return view('admin.complaint.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $complaint = Complaint::with('users', 'room')->where('id', $id)->first();
        return view('admin.complaint.show', compact('complaint'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $complaint = Complaint::with('users', 'room')->where('id', $id)->first();
        return view('admin.complaint.edit', compact('complaint'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $complaint = Complaint::find($id);
        $complaint->status = $request->status;
        $complaint->feedback = $request->feedback;
        $complaint->save();

        return redirect()->route('complaint.index')->with('success', 'Maklum Balas Telah Berjaya Direkodkan');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
