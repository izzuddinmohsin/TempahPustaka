<?php

namespace App\Http\Controllers\user;

use App\Models\Room;
use App\Models\Complaint;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::with('users', 'room')->where('userID', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('user.complaint.index', compact('complaints'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room = Room::all();
        return view('user.complaint.create', compact('room'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        do {
            $random = Str::random(5);
            $ComplaintID = '#ADUAN-' . $random . '-00-' . $request->userID;
        } while (Complaint::where('ComplaintID', $ComplaintID)->exists());
        
        $complaint = new Complaint();
        $complaint->ComplaintID = $ComplaintID;
        $complaint->userID = $request->userID;
        $complaint->roomID = $request->roomID;
        $complaint->category = $request->category;
        $complaint->complaint = $request->complaint;
        $complaint->status = $request->status;
        $complaint->save();

        return redirect()->route('complaints.index')->with('success', 'Aduan Telah Berjaya Dicipta');        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $complaint = Complaint::with('users', 'room')->where('id', $id)->first();
        return view('user.complaint.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
