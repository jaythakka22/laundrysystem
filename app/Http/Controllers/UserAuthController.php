<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(Request $request){
       
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required',
         
        ]);
 
        $user = User::create([
            'name' => $validator['name'],
            'email' => $validator['email'],
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
        // Admin login post request
        public function adminLogin(Request $request)
        {
            
            $admin_fields = $request->validate([
                'email' => 'required|string|',
                'password' => 'required|string|'
            ]);
            // check emails
            $user = User::where('email', $admin_fields['email'])->first();
            // check passsword
    
            if (!$user || !Hash::check($admin_fields['password'], $user->password)){
                return redirect()->route('adminlogin')->with('error', 'Invalid credentials');
    
            }
            if ($user->role !== 'admin') {
                return redirect()->route('adminlogin')->with('error', 'You are not authorized to access the admin area.');
            }
            $token = $user->createToken('myappToken')->plainTextToken;
            Auth::login($user); 
            return redirect()->route('admindashboard')->with('user', $user);
        }  
}
