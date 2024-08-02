<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemrayController extends Controller
{
    public function index()
    {
        return view('admin.pemray.dashboard');
    }
}
