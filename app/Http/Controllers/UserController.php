<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'userID' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phoneNum' => 'required',
            'name' => 'required'
        ]);

        $userExists = User::where('userID', $request->userID)->exists();

        if ($userExists) {
            return redirect()->back()->with('error', 'UserID ini sudah di daftarkan.');
        }

        $user = new User;
        $user->userID = $request->userID;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phoneNum = $request->phoneNum;
        $user->name = $request->name;
        $user->category = $request->category;
        $user->role = $request->role;
        $user->status = $request->status;

        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna telah berjaya dicipta');

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $user = User::find($id);
        return view('admin.user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $user = User::find($id);
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->phoneNum = $request->phoneNum;
        $user->name = $request->name;
        $user->category = $request->category;
        $user->role = $request->role;
        $user->status = $request->status;

        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna telah berjaya dipadam');


    }
}
