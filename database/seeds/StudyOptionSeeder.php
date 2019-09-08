<?php

use App\Skill;
use App\StudyOption;
use Illuminate\Database\Seeder;

class StudyOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providers = [
            ['name' => 'Udemy', 'url' => 'https://udemy.com'],
            ['name' => 'University of New South Wales', 'url' => 'https://unsw.edu.au'],
            ['name' => 'Skill Share', 'url' => 'https://skillshare.com'],
            ['name' => 'Open Universities', 'url' => 'https://open.edu.au'],
            ['name' => 'TAFE Queensland', 'url' => 'https://tafeqld.edit.au'],
        ];

        $skills = Skill::all();

        $courses = [
            ['provider' => 0, 'skills' => [1,2], 'name' => 'Learn Web Development', 'description' => 'Become a web developer by completing our 6 week online course'],
            ['provider' => 2, 'skills' => [1,2], 'name' => 'Learn Back-end Web Development', 'description' => 'Learn to code web applications online.'],
            ['provider' => 1, 'skills' => [3,6], 'name' => 'Bachelor of Digital Arts', 'description' => 'Become a graphic designer/marketing expert through our undergrad degree'],
            ['provider' => 4, 'skills' => [3,4], 'name' => 'Front-end web development for beginners', 'description' => 'Become a front-end web developer by completing our 6 week online course'],
            ['provider' => 4, 'skills' => [6,7], 'name' => 'SEO for Dummies', 'description' => 'Get started with SEO, we will guide you from zero knowledge.'],
            ['provider' => 3, 'skills' => [5,8], 'name' => 'Bachelor of Business', 'description' => 'Become a business expert with our flexible business degree'],
        ];

        foreach ($courses as $course) {
            $studyOption = new StudyOption;
            $studyOption->name = $course['name'];
            $studyOption->description = $course['description'];
            $studyOption->provider = $providers[$course['provider']]['name'];
            $studyOption->url = $providers[$course['provider']]['url'];
            $studyOption->save();

            $studyOption->skills()->attach($course['skills']);
        }
    }
}
