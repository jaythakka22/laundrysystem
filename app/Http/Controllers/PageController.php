<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use App\Models\Services;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function indexPage()
    {  
        return view("index");      
    }
    public function aboutUs()
    {  
        return view("about");      
    }
    public function contactUs()
    {  
        return view("contact");      
    }
    public function pricing()
    {  
        return view("pricing");      
    }
    public function service()
    {
        $user = auth()->user();
        $services = Services::all();
        return view("services")->with('services', $services)->with('user', $user);      
    }
    public function signUp()
    {  
        return view("signup");      
    }
    public function report()
    {  
        $orders= Orders::all(); 
        return view("admindashboard.report")->with('orders', $orders);;      
    }
    public function adminDashboard()
    {  
        if ((!auth()->user())) {
            return redirect()->route('adminlogin')->with('error', 'Please enter your login details.');

        }
        $orders = Orders::all();
        $services = Services::all();
        $users = User::all();
        $user = auth()->user();
        if ($user->role !== 'admin') {
            return redirect()->route('adminlogin')->with('error', 'You are not authorized to access the admin area.');
        }
        return view("admindashboard.dashboard")->with('services', $services)->with('orders', $orders)->with('users', $users);      
    }
    public function adminLoginPage()
    {  
        return view("admindashboard.login");      
    }
  
}
