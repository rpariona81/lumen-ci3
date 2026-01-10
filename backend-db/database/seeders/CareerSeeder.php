<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $career1 = Career::create([
            'career_name' => 'Computer Science',
            'career_description' => 'Study of computers and computational systems.',
            'career_code' => 'CS101',
            'career_alias' => 'CompSci',
            'career_display' => 'Computer Science',
            'career_related' => 'Engineering'
        ]);
        
        $career2 = Career::create([
            'career_name' => 'Business Administration',
            'career_description' => 'Study of business management and operations.',
            'career_code' => 'BA201',
            'career_alias' => 'BizAdmin',
            'career_display' => 'Business Administration',
            'career_related' => 'Management'
        ]);

        $career3 = Career::create([
            'career_name' => 'Mechanical Engineering',
            'career_description' => 'Design and manufacture of mechanical systems.',
            'career_code' => 'ME301',
            'career_alias' => 'MechEng',
            'career_display' => 'Mechanical Engineering',
            'career_related' => 'Engineering'
        ]); 

        $career4 = Career::create([
            'career_name' => 'Psychology',
            'career_description' => 'Study of mind and behavior.',
            'career_code' => 'PSY401',
            'career_alias' => 'Psych',
            'career_display' => 'Psychology',
            'career_related' => 'Social Sciences'
        ]); 

        $career5 = Career::create([
            'career_name' => 'Graphic Design',
            'career_description' => 'Art and practice of planning and projecting ideas and experiences.',
            'career_code' => 'GD501',
            'career_alias' => 'GraphDesign',
            'career_display' => 'Graphic Design',
            'career_related' => 'Arts'
        ]); 
    }
}
