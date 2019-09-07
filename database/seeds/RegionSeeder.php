<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            ['state' => 'NSW', 'region' => 'metro'],
            ['state' => 'NSW', 'region' => 'rural'],
            ['state' => 'QLD', 'region' => 'metro'],
            ['state' => 'QLD', 'region' => 'rural'],
            ['state' => 'VIC', 'region' => 'metro'],
            ['state' => 'VIC', 'region' => 'rural'],
            ['state' => 'SA', 'region' => 'metro'],
            ['state' => 'SA', 'region' => 'rural'],
            ['state' => 'WA', 'region' => 'metro'],
            ['state' => 'WA', 'region' => 'rural'],
            ['state' => 'NT', 'region' => 'metro'],
            ['state' => 'NT', 'region' => 'rural'],
            ['state' => 'TAS', 'region' => 'metro'],
            ['state' => 'TAS', 'region' => 'rural'],
            ['state' => 'ACT', 'region' => 'metro'],
            ['state' => 'ACT', 'region' => 'rural'],
        ];

        foreach ($regions as $region) {
            $dbRegion = new Region;
            $dbRegion->state = $region['state'];
            $dbRegion->region = $region['region'];
            $dbRegion->save();
        }
    }
}
