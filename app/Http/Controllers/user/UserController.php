<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function index()
    {
        $user = User::find(Auth::user()->id);
        return view('user.user.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.user.edit', compact('user'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        if ($request->userID != null) {
            if ($request->userID != $request->old_userID) {
                $userExists = User::where('userID', $request->userID)->exists();

                if ($userExists) {
                    return redirect()->back()->with('error', 'UserID ini sudah di daftarkan. Sila gantikan yang lain');
                } else{
                    $user->userID = $request->userID;
                }           
            }
        }

        $user->email = $request->email;
        $user->phoneNum = $request->phoneNum;
        $user->name = $request->name;
        $user->category = $request->category;

        $user->save();

        return redirect()->route('user.index')->with('success', 'Pengguna telah berjaya dikemaskini');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
