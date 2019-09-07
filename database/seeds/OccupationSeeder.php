<?php

use App\Occupation;
use App\IncomeByOccupation;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupationIncomes = IncomeByOccupation::select('occupation')->distinct()->get();

        foreach ($occupationIncomes as $occupationIncome) {
            $occupation = new Occupation;

            $occupation->occupation = $occupationIncome->occupation;
            $occupation->save();
        }
    }
}
