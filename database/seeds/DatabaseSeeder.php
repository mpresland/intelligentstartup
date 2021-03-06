<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(NeisEnterprisesTableSeeder::class);
        $this->call(IncomeByOccupationTableSeeder::class);
        $this->call(MedianHousePricesTableSeeder::class);
        $this->call(OccupationSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(StudyOptionSeeder::class);
    }
}
