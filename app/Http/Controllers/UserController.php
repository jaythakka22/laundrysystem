<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserController;

class UserControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(UserController $userController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserController $userController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserController $userController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserController $userController)
    {
        //
    }
    public function register(Request $request){
       
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'location' => 'required|string|confirmed',
        ]);
    
        $user = User::create([
            'name' => $validator['name'],
            'email' => $validator['email'],
            'location' => $validator['location'],
            'password' => bcrypt($validator['password'])
        ]);
        $token = $user->createToken('myappToken')->plainTextToken;
        Auth::login($user);
        return view('index', compact('user'));
    }

    public function login(Request $request){

        $user_fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Check if the user exists
        $user = User::where('email', $user_fields['email'])->first();
    
        // Check the password
        if (!$user || !Hash::check($user_fields['password'], $user->password)){
            return back()->with('error', 'Invalid login details');
        }
    
        // Check the account type and redirect accordingly
        if ($user->account_type === 'individual') {
            $token = $user->createToken('myappToken')->plainTextToken;
            Auth::login($user);
            return view('web.UsersUpgradeAccnt', compact('user'));
        } 
        $token = $user->createToken('myappToken')->plainTextToken;
        Auth::login($user);
        return redirect()->route('index');
    }
}
