<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Client_Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $client1 = Client::where('client_name', 'Client 01')->first();
        $client2 = Client::where('client_name', 'Client 02')->first();
        $client3 = Client::where('client_name', 'Client 03')->first();

        $client_career1 = Client_Career::create([
            'client_career_name' => 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información',
            'client_career_description' => 'Study of computers and computational systems.',
            'client_career_display' => 'Arq. de Plataformas y Servicios TI',
            'client_career_related' => 'Computación e Informática'
        ]);
        $client_career1->client()->associate($client1);
        $client_career1->save();

        $client_career2 = Client_Career::create([
            'client_career_name' => 'Desarrollo de Sistemas de Información',
            'client_career_description' => 'Study of computers and computational systems.',
            'client_career_display' => 'Desarrollo de Sistemas de Información',
            'client_career_related' => 'Computación e Informática'
        ]);
        $client_career2->client()->associate($client2);
        $client_career2->save();

        $client_career3 = Client_Career::create([
            'client_career_name' => 'Enfermería Técnica',
            'client_career_description' => 'Care body human and health.',
            'client_career_display' => 'Enfermería Técnica',
            'client_career_related' => 'Ciencias de la Salud'
        ]);
        $client_career3->client()->associate($client3);
        $client_career3->save();

        $client_career4 = Client_Career::create([
            'client_career_name' => 'Enfermería Técnica',
            'client_career_description' => 'Care body human and health.',
            'client_career_display' => 'Enfermería Técnica',
            'client_career_related' => 'Ciencias de la Salud'
        ]);
        $client_career4->client()->associate($client1);
        $client_career4->save();

        $client_career5 = Client_Career::create([
            'client_career_name' => 'Enfermería Técnica',
            'client_career_description' => 'Care body human and health.',
            'client_career_display' => 'Enfermería Técnica',
            'client_career_related' => 'Ciencias de la Salud'
        ]);
        $client_career5->client()->associate($client2);
        $client_career5->save();

        $client_career6 = Client_Career::create([
            'client_career_name' => 'Farmacia Técnica',
            'client_career_description' => 'Care body human and health.',
            'client_career_display' => 'Farmacia Técnica',
            'client_career_related' => 'Ciencias de la Salud'
        ]);
        $client_career6->client()->associate($client3);
        $client_career6->save();
    }
}
