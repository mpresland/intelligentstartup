<?php

use Illuminate\Database\Seeder;

class NeisEnterprisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('neis-enterprises')->delete();

        \DB::table('neis-enterprises')->insert(array(
            0 =>
            array(
                'region' => 'act',
                'state' => 'ACT',
                'enterprises' => 287,
                'successes' => 87,
            ),
            1 =>
            array(
                'region' => 'nsw',
                'state' => 'NSW',
                'enterprises' => 1519,
                'successes' => 491,
            ),
            2 =>
            array(
                'region' => 'nsw_metro',
                'state' => 'NSW',
                'enterprises' => 5190,
                'successes' => 1776,
            ),
            3 =>
            array(
                'region' => 'nt',
                'state' => 'NT',
                'enterprises' => 92,
                'successes' => 33,
            ),
            4 =>
            array(
                'region' => 'qld',
                'state' => 'QLD',
                'enterprises' => 2288,
                'successes' => 858,
            ),
            5 =>
            array(
                'region' => 'qld_metro',
                'state' => 'QLD',
                'enterprises' => 3829,
                'successes' => 1047,
            ),
            6 =>
            array(
                'region' => 'sa',
                'state' => 'SA',
                'enterprises' => 293,
                'successes' => 91,
            ),
            7 =>
            array(
                'region' => 'sa_metro',
                'state' => 'SA',
                'enterprises' => 1505,
                'successes' => 466,
            ),
            8 =>
            array(
                'region' => 'tas',
                'state' => 'TAS',
                'enterprises' => 761,
                'successes' => 326,
            ),
            9 =>
            array(
                'region' => 'vic',
                'state' => 'VIC',
                'enterprises' => 1363,
                'successes' => 562,
            ),
            10 =>
            array(
                'region' => 'vic_metro',
                'state' => 'VIC',
                'enterprises' => 4514,
                'successes' => 1584,
            ),
            11 =>
            array(
                'region' => 'wa',
                'state' => 'WA',
                'enterprises' => 285,
                'successes' => 117,
            ),
            12 =>
            array(
                'region' => 'wa_metro',
                'state' => 'WA',
                'enterprises' => 2089,
                'successes' => 753,
            ),
        ));
    }
}
