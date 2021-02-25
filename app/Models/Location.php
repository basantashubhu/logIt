<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'log_view_location';

    protected $primaryKey = 'p21_location_id';

    public $timestamps = false;

    protected $fillable = [
        'p21_location_id',
        'loc_short_name',
    ];
}
