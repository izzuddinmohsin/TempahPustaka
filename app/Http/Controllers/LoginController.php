<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create')->with('success', 'Cipta Akaun Telah Berjaya');  ;
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

        $user->role = 'user';
        $user->status = 'tidak aktif';

        $user->save();

        return redirect()->back()->with('success', 'Cipta Akaun Telah Berjaya, Sila tunggu pengesahan dari pihak ');        

    }

    public function login(Request $request)
    {
        //this function for login process
        //dd($request);
        $request->validate([
            'userID' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'userID' => $request->userID,
            'password' => $request->password,
        ];


         if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 'aktif') {
                if(Auth::user()->role == 'admin'){
                    return redirect ('admin')->with('berjaya', 'Log Masuk Telah Berjaya');
    
                }else if(Auth::user()->role == 'user'){
                    return redirect ('user')->with('berjaya', 'Log Masuk Telah Berjaya');
    
                }
            }else{
                return redirect()->back()->with('noAccess', 'Log Masuk Tidak Berjaya - Akaun Anda Belum Diaktifkan atau Telah Disekat');        
            }
           
        }else{

            return redirect()->back()->with('error', 'Log Masuk Tidak Berjaya - Sila Isikan Maklumat Yang Benar');        
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }
    
}
