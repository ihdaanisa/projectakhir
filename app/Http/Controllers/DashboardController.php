<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        $nama = Auth::user()->name;
        return view('dashboard.user', compact('nama'));
    }

    public function adminDashboard()
    {
        $nama = Auth::user()->name;
        return view('dashboard.admin', compact('nama'));
    }
}
