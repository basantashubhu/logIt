<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\JobType;
use App\Models\Technician;

class HomeController extends Controller
{
    public function home() {
        $locations = Location::orderBy('loc_short_name', 'ASC')->get();
        return view('home',compact('locations'));
    }

    public function admin() {
        $locations = Location::orderBy('loc_short_name', 'ASC')->get();
        return view('admin',compact('locations'));
    }

    public function identify(Request $request)
    {
        session(['name' => $request->name]);
        return ['message' => 'Name stored successfully'];
    }
}
