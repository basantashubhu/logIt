<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    public function index(Request $request)
    {
		$jobTypes = JobType::orderBy('class_description','ASC')->get();

        return $jobTypes->map(function($type) {
            return [
                'label' => $type->class_description,
                'value' => $type->p21_class_id,
            ];
        });
    }
}
