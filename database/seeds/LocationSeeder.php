<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['P21_location_id'=>'100003','loc_short_name' => 'COL-SHOP'],
            ['P21_location_id'=>'100008','loc_short_name' => 'COL-SVC'],
            ['P21_location_id'=>'100004','loc_short_name' => 'BREA'],
            ['P21_location_id'=>'100002','loc_short_name' => 'INDY'],
            ['P21_location_id'=>'153801','loc_short_name' => 'RHM-WL'],
            ['P21_location_id'=>'124339','loc_short_name' => 'RHM-GR'],
            ['P21_location_id'=>'125102','loc_short_name' => 'SPRINGBORO'],
            ['P21_location_id'=>'128640','loc_short_name' => 'NAHI'],
        ];
        foreach($locations as $location) {
            Location::create($location);
        }
    }
}
