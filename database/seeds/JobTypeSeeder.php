<?php

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['job_type' => 'CYLINDER' , 'job_type_description' => 'CYLINDER REPAIR'],
            ['job_type' => 'HPU' , 'job_type_description' => 'HPU SERVICE'],
            ['job_type' => 'INSPECT' , 'job_type_description' => 'INSPECTION'],
            ['job_type' => 'SERVICE' , 'job_type_description' => 'SERVICE - GENERAL'],
        ];

        foreach($types as $type) {
            JobType::create($type);
        }
    }
}
