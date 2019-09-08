<?php

use App\Skill;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'Back-end Development',
            'Web Development',
            'Graphic Design',
            'Front-end Development',
            'Accounting',
            'Marketing',
            'SEO',
            'Management',
        ];

        foreach ($skills as $skill) {
            $sk = new Skill;
            $sk->name = $skill;
            $sk->save();
        }
    }
}
