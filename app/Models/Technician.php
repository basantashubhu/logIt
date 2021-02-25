<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    protected $table = 'log_view_technician';

    protected $primaryKey = 'contact_id';

    public $timestamps = false;

    protected $fillable = [
        'location_id',
        'contact_id',
        'technician_name',
    ];
}
