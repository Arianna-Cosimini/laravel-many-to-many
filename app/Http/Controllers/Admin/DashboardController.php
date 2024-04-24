<?php

namespace App\Http\Controllers\Admin;

use App\Models\project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view("admin.index", compact("user"));
    }

    public function users()
    {
        return view('admin.index');
    }
}
