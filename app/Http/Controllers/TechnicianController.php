<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function index(Request $request)
    {
	 $technicians = Technician::where('p21_tech_location', $request->location_id)->orderBy('technician_name','ASC')->get();

        return $technicians->map(function($tech) {
            return [
                'label' => $tech->technician_name,
                'value' => $tech->p21_contact_id
            ];
        });
    }
}
