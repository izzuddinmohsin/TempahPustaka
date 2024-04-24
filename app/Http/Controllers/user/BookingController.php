<?php

namespace App\Http\Controllers\user;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('users', 'room')->where('userID', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('user.booking.index', compact('bookings'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        return view('user.booking.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        do {
            $random = Str::random(5);
            $bookingID = '#' . $random . '-00-' . $request->userID;
        } while (Booking::where('bookingID', $bookingID)->exists());
        
        $a = new Booking();

        $a->userID = $request->userID;
        $a->roomID = $request->roomID;
        $a->startDate = $request->startDate;
        $a->endDate = $request->endDate;
        $a->startTime = $request->startTime;
        $a->endtTime = $request->endtTime;
        $a->purpose = $request->purpose;

        $a->status = 'dipohon';

        $a->bookingID = $bookingID;

        $a->save();

        return redirect()->route('bookings.index')->with('success', 'Tempahan Telah Berjaya Dicipta');           
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = Booking::with('users', 'room')->where('userID', Auth::user()->id)->where('id', $id)->first();
        return view('user.booking.show', compact('booking'));    

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //modify status apply to cancel
        $booking = Booking::find($id);
        $booking->status = 'dibatalkan';
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Tempahan Telah Berjaya Dibatalkan');
    }


    

}
