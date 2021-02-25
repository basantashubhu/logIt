<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeLogController extends Controller
{
    public function index(Request $request)
    {
        return TimeLog::where('log_date',$request->log_date)
            ->where('P21_location_id', $request->P21_location_id)
            ->where('P21_technician_id', $request->P21_technician_id)
            ->where('delete_flag','N')
            ->get();
    }
    public function raw()
    {
        return Timelog::all();
    }

    public function show($recordNo) {
        return TimeLog::find($recordNo);
    }

    public function store(Request $request)
    {
	 return TimeLog::create($request->all());
    }

    public function update(Request $request, $recordNo)
    {
        if(empty(session('name'))) {
            // Entry Screen
            $log = TimeLog::find($recordNo);
            $log->update($request->all());
            return $log;
        } else {
            // Edit Screen
            $log = TimeLog::find($recordNo);
            $clone = $log->replicate();
            $clone->record_no_source = $log->record_no;
            $clone->fill($request->all());
            $clone->save();
            $log->delete_flag = 'Y';
            $log->edited_flag = 'Y';
            $log->edited_by = session('name');
            $log->date_edited = Carbon::now()->toDateTime();
            $log->save();
            return $clone;
        }
    }
}
