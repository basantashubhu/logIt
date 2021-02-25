<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    protected $table = 'log';

    protected $primaryKey = 'record_no';

    public $timestamps = false;

    protected $fillable = [
        'record_no_source',
        'log_date',
        'P21_location_id',
        'P21_loc_short_name_ud',
        'P21_technician_id',
        'technician_name',
        'job_type',
        'job_name',
        'job_comment',
        'log_hours',
        'date_created',
        'delete_flag',
        'date_edited',
        'edited_by',
        'edited_flag',
    ];

    protected $casts = [
        'log_date' => 'date',
        'date_created' => 'date',
        'date_edited' => 'date'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'P21_location_id', 'P21_location_id');
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'P21_technician_id', 'contact_id');
    }

    public function source()
    {
        return $this->belongsTo(TimeLog::class, 'record_no_source','record_no');
    }

    public function job()
    {
        return $this->belongsTo(JobType::class, 'job_type', 'job_type');
    }

    public function toArray() {
        return [
            'record_no' => $this->record_no,
            'record_no_source' => $this->record_no_source,
            'log_date' => $this->log_date->format('Y-m-d'),
            'P21_location_id' => $this->P21_location_id,
            'loc_short_name' => $this->P21_loc_short_name_ud,
            'technician_id' => $this->P21_technician_id,
            'technician_name' => $this->technician_name,
            'job_type' => $this->job_type,
            'job_name' => $this->job_name,
            'job_comment' => $this->job_comment,
            'log_hours' => number_format($this->log_hours,2),
            'date_created' => $this->date_created,
            'delete_flag' => $this->delete_flag,
            'date_edited' => $this->date_edited,
            'edited_by' => $this->edited_by,
            'edited_flag' => $this->edited_flag,
        ];

    }
}
