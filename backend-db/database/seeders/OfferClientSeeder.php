<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;
use App\Models\Career;
use App\Models\OfferClient;

class OfferClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client1 = Client::where('client_name', 'Client 01')->first();
        $client2 = Client::where('client_name', 'Client 02')->first();
        $client3 = Client::where('client_name', 'Client 03')->first();

        $career1 = Career::where('career_name', 'Computer Science')->first();
        $career2 = Career::where('career_name', 'Business Administration')->first();
        $career3 = Career::where('career_name', 'Mechanical Engineering')->first();

        $offer1 = OfferClient::create([
            'client_id' => $client1->id,
            'career_offered_code' => 'P002',
            'career_offered' => 'Computer Science',
            'level_offered' => 'Bachelor',
            'career_timeframe' => '4 years',
            'knowledge_area' => 'Engineering'
        ]);
        $offer1->career()->associate($career1);
        $offer1->save();

        $offer2 = OfferClient::create([
            'client_id' => $client2->id,
            'career_offered_code' => 'P001',
            'career_offered' => 'Business Administration',
            'level_offered' => 'Master',
            'career_timeframe' => '2 years',
            'knowledge_area' => 'Management'
        ]);
        $offer2->career()->associate($career2);
        $offer2->save();

        $offer3 = OfferClient::create([
            'client_id' => $client3->id,
            'career_offered_code' => 'P003',
            'career_offered' => 'Graphic Design',
            'level_offered' => 'Diploma',
            'career_timeframe' => '1 year',
            'knowledge_area' => 'Arts'
        ]);
        $offer3->career()->associate($career3);
        $offer3->save();

        $offer4 = OfferClient::create([
            'client_id' => $client1->id,
            'career_offered_code' => 'P005',
            'career_offered' => 'Mechanical Engineering',
            'level_offered' => 'Bachelor',
            'career_timeframe' => '4 years',
            'knowledge_area' => 'Engineering'
        ]);
        $offer4->career()->associate($career1);
        $offer4->save();

        $offer5 = OfferClient::create([
            'client_id' => $client2->id,
            'career_offered_code' => 'P006',
            'career_offered' => 'Psychology',
            'level_offered' => 'Master',
            'career_timeframe' => '2 years',
            'knowledge_area' => 'Social Sciences'
        ]);
        $offer5->career()->associate($career2);
        $offer5->save();

        $offer6 = OfferClient::create([
            'client_id' => $client3->id,
            'career_offered_code' => 'P005',
            'career_offered' => 'Data Science',
            'level_offered' => 'PhD',
            'career_timeframe' => '3 years',
            'knowledge_area' => 'Engineering'
        ]);
        $offer6->career()->associate($career3);
        $offer6->save();

    }
}
