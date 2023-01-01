<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }
    public function create_2()
    {
        return view('users.register_2');
    }

    // Admin Page
    public function dashboard()
    {
        $users = User::lastest()->get();
        $posts = Listing::all();
        $booking = Booking::all();
        return view('admin.dashboard', compact('users','posts','bookings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email | unique:users',
            'contact' => 'required | min:10 | max:10',
            'role' => 'required',
            'password' => 'required | confirmed | min:6',
        ]);

        // Hashed Password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User Created and Logged in Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $formFields = $request->validate([
            'email'=>'required | email',
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            if(auth()->user()->role == '1'){
                return redirect('/manage')->with('message', 'You are welcome');
            }elseif(auth()->user()->role == '2'){
                return redirect('admin/dashboard')->with('message', 'You are welcome');
            }else{
                return redirect('/')->with('message', 'You are welcome');
            }
        }

        return back()->withErrors([
            'email' => 'invalide credentials'
        ])->onlyInput('email');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User logged out');
    }
}