<?php

namespace App\Observers;

use App\Models\TimeLog;
use App\Models\Technician;
use App\Models\Location;
use Carbon\Carbon;

class TimeLogObserver
{
    public function creating(TimeLog $log)
    {

        $tech = Technician::where('p21_contact_id',$log->P21_technician_id)->firstOrFail();
        $location = Location::where('P21_location_id',$log->P21_location_id)->firstOrFail();

        if($log->log_hours == 0) {
            $log->delete_flag = 'Y';
        }

        $log->fill([
            'P21_loc_short_name_ud' => $location->loc_short_name,
            'technician_name' => $tech->technician_name,
            'date_created' => Carbon::now()->toDateTime(),
        ]);

    }

    public function updating(TimeLog $log)
    {
        $tech = Technician::where('p21_contact_id',$log->P21_technician_id)->firstOrFail();
        $location = Location::where('P21_location_id',$log->P21_location_id)->firstOrFail();

        $log->fill([
            'P21_loc_short_name_ud' => $location->loc_short_name,
            'technician_name' => $tech->technician_name,
        ]);

    }
}
