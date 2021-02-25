<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'log_view_job_type';

    protected $primaryKey = 'job_type';

    public $timestamps = false;

    protected $fillable = [
        'job_type',
        'job_type_description',
    ];

    public function getKeyType()
    {
        return 'string';
    }

    public function getIncrementing()
    {
        return false;
    }

}
