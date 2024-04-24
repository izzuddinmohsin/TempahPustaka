<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::all();
        return view('admin.room.index', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room = Room::all();
        return view('admin.room.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $room = new Room();
        
        $randomString = Str::random(8);
        $currentDate = Carbon::now()->toDateString();

        if($request->picture != null) {
            $image = 'ruang-'.$randomString.'-'.$currentDate.'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('image/room'), $image);

            $room->picture =  $image;

        }

     
        $room->name = $request->name;
        $room->location = $request->location;
        $room->capacity = $request->capacity;
        $room->facility = $request->facility;
        $room->purpose = $request->purpose;

        $room->save();

        return redirect()->route('room.index')->with('success', 'Bilik/Ruang Baharu Telah Berjaya Disimpan');        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::find($id);
        return view('admin.room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $room = Room::find($id);
        return view('admin.room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($request->id);
        
        $randomString = Str::random(8);
        $currentDate = Carbon::now()->toDateString();

        if($request->picture != null){
            $picture_path = public_path()."/image/room/";
            $picture = $picture_path.$request->old_picture;
            @unlink($picture);

            $image = 'ruang-'.$randomString.'-'.$currentDate.'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('image/room'), $image);
            $room->picture = $image;

        }else{
            
            $room->picture = $request->old_picture;
        }

     
        $room->name = $request->name;
        $room->location = $request->location;
        $room->capacity = $request->capacity;
        $room->facility = $request->facility;
        $room->purpose = $request->purpose;

        $room->save();

        return redirect()->route('room.index')->with('success', 'Bilik/Ruang Telah Berjaya Dikemaskini');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $picture_path = public_path()."/image/room/";
        $picture = $picture_path.$room->picture;
        if(file_exists($picture)){
            @unlink($picture);
        }
        $room->delete();
        return redirect()->route('room.index')->with('success', 'Bilik/Ruang telah berjaya dipadam');
    }
}
