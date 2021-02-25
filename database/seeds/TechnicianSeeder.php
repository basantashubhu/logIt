<?php

use App\Models\Technician;
use Illuminate\Database\Seeder;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technicians = [
            ['location_id' => '100003','contact_id' => '65201','technician_name' => 'Brian Horner'],
            ['location_id' => '100003','contact_id' => '65192','technician_name' => 'Josh Wilson'],
            ['location_id' => '100003','contact_id' => '65193','technician_name' => 'Nick Maffe'],
            ['location_id' => '100008','contact_id' => '65194','technician_name' => 'Brian Horner'],
            ['location_id' => '100008','contact_id' => '45046','technician_name' => 'Chad Williamson'],
            ['location_id' => '100008','contact_id' => '65199','technician_name' => 'Dale Williamson'],
            ['location_id' => '100008','contact_id' => '65197','technician_name' => 'David Kirk'],
            ['location_id' => '100008','contact_id' => '65198','technician_name' => 'Gary White'],
            ['location_id' => '100008','contact_id' => '65200','technician_name' => 'Kevin Mehling'],
            ['location_id' => '100008','contact_id' => '65195','technician_name' => 'Paul Ballard'],
            ['location_id' => '100008','contact_id' => '65196','technician_name' => 'Roland Heyder'],
            ['location_id' => '124339','contact_id' => '37843','technician_name' => 'Brian LaShure'],
            ['location_id' => '124339','contact_id' => '59264','technician_name' => 'JEFF BELLINGER'],
            ['location_id' => '124339','contact_id' => '34286','technician_name' => 'Jeff Hernandez'],
            ['location_id' => '124339','contact_id' => '45428','technician_name' => 'JEFF HERNANDEZ (warranty)'],
            ['location_id' => '124339','contact_id' => '47494','technician_name' => 'MATT GOODYKE'],
            ['location_id' => '124339','contact_id' => '34287','technician_name' => 'Outside Contractor'],
            ['location_id' => '124339','contact_id' => '37003','technician_name' => 'Tim Goodyke'],
            ['location_id' => '124339','contact_id' => '45427','technician_name' => 'TIM GOODYKE (warranty)'],
            ['location_id' => '124339','contact_id' => '34330','technician_name' => 'Trip Charge'],
            ['location_id' => '124339','contact_id' => '34331','technician_name' => 'Vibration  Testing'],
            ['location_id' => '128639','contact_id' => '40582','technician_name' => 'ANDREW JENSEN'],
            ['location_id' => '128639','contact_id' => '40584','technician_name' => 'BLAKE CYR'],
            ['location_id' => '128639','contact_id' => '40583','technician_name' => 'CURTIS JACKSON'],
            ['location_id' => '128639','contact_id' => '40585','technician_name' => 'JOHN OLIVIER'],
            ['location_id' => '128640','contact_id' => '33213','technician_name' => 'BURNELL WILSON'],
            ['location_id' => '128640','contact_id' => '41690','technician_name' => 'CASEY REED'],
            ['location_id' => '128640','contact_id' => '36473','technician_name' => 'CHARIESE HENRY'],
            ['location_id' => '128640','contact_id' => '41165','technician_name' => 'CHRIS GRAHAM'],
            ['location_id' => '128640','contact_id' => '33054','technician_name' => 'DAVID GRAHAM'],
            ['location_id' => '128640','contact_id' => '38215','technician_name' => 'PHILLIP  ENSMINGER'],
            ['location_id' => '128640','contact_id' => '33053','technician_name' => 'ROBERT MCINTYRE'],
            ['location_id' => '128640','contact_id' => '36472','technician_name' => 'SAM WESLEY'],
            ['location_id' => '128640','contact_id' => '36498','technician_name' => 'SERVICE  DEPARTMENT'],
            ['location_id' => '153801','contact_id' => '61314','technician_name' => 'ADAM ASKREN'],
            ['location_id' => '153801','contact_id' => '49094','technician_name' => 'ADRIAN  FRATILA'],
            ['location_id' => '153801','contact_id' => '37164','technician_name' => 'Alana Doe'],
            ['location_id' => '153801','contact_id' => '37180','technician_name' => 'Andy Raczy'],
            ['location_id' => '153801','contact_id' => '64692','technician_name' => 'ANTHONY BIZON'],
            ['location_id' => '153801','contact_id' => '52668','technician_name' => 'BOBBY PERRY'],
            ['location_id' => '153801','contact_id' => '52874','technician_name' => 'CHRIS LAPHAM  (CONTRACTOR)'],
            ['location_id' => '153801','contact_id' => '43172','technician_name' => 'CHRIS STEVENSON JR.'],
            ['location_id' => '153801','contact_id' => '51186','technician_name' => 'DAN GIRARDIN'],
            ['location_id' => '153801','contact_id' => '56940','technician_name' => 'DAVID GORDON (CONTRACTOR)'],
            ['location_id' => '153801','contact_id' => '50000','technician_name' => 'DON THORNTON (CONTRACTOR)'],
            ['location_id' => '153801','contact_id' => '37174','technician_name' => 'Duane Smithey'],
            ['location_id' => '153801','contact_id' => '57950','technician_name' => 'FRED NETZEL (CONTRACTOR)'],
            ['location_id' => '153801','contact_id' => '37178','technician_name' => 'Fred Shagena'],
            ['location_id' => '153801','contact_id' => '53734','technician_name' => 'GARRETT BAKER'],
            ['location_id' => '153801','contact_id' => '62072','technician_name' => 'GARY PHILLIPS (CONTRACTOR)'],
            ['location_id' => '153801','contact_id' => '42402','technician_name' => 'GARY RYS (CONTRACTOR)'],
            ['location_id' => '153801','contact_id' => '49826','technician_name' => 'JEFF CARRIER (CONTRACTOR)'],
            ['location_id' => '153801','contact_id' => '37166','technician_name' => 'Jim Ferriby'],
            ['location_id' => '153801','contact_id' => '37168','technician_name' => 'John Kellar'],
            ['location_id' => '153801','contact_id' => '55964','technician_name' => 'KYLE CEJMER'],
            ['location_id' => '153801','contact_id' => '64696','technician_name' => 'KYLE SWINDLEHURST'],
            ['location_id' => '153801','contact_id' => '37172','technician_name' => 'Matt Schweiss'],
            ['location_id' => '153801','contact_id' => '37170','technician_name' => 'Megan Olsen'],
            ['location_id' => '153801','contact_id' => '42870','technician_name' => 'MIKE SMITH'],
            ['location_id' => '153801','contact_id' => '64694','technician_name' => 'NEELIMA SARIKONDA'],
            ['location_id' => '153801','contact_id' => '43936','technician_name' => 'NEIL GIST (RHM)'],
            ['location_id' => '153801','contact_id' => '37176','technician_name' => 'Rob Walter'],
            ['location_id' => '153801','contact_id' => '37162','technician_name' => 'Tim Bowles'],
            ['location_id' => '153801','contact_id' => '44072','technician_name' => 'Tim Goodyke (Westland)'],
            ['location_id' => '153801','contact_id' => '38758','technician_name' => 'TOMMY MCLELLAND'],
            ['location_id' => '153801','contact_id' => '54596','technician_name' => 'WILLIAM JORDAN'],
        ];

        foreach($technicians as $tech) {
            Technician::create($tech);
        }
    }
}
