<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

use App\Models\Client;
use App\Models\Repository;

class RepoClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        //
        $client1 = Client::where('client_name', 'Client 01')->first();
        $client2 = Client::where('client_name', 'Client 02')->first();
        $client3 = Client::where('client_name', 'Client 03')->first();

        $repo1 = Repository::create([
            'client_id' => $client1->id,
            'repo_code' => $faker->isbn10(),
            'repo_isbn' => $faker->isbn13(),
            'repo_title' => 'Guia Del Estudiante Pasteleria',
            'repo_display' => 'Pastelería - Guía Del Estudiante',
            'repo_type' => 'Ebook',
            'repo_format' => 'PDF',
            'repo_author' => 'Aida Ludeña Sánchez',
            'repo_editorial' => 'Centro de Servicios para la Capacitación Laboral y Desarrollo - CAPLAB',
            'repo_year' => 2020,
            'repo_pages' => 150,
            'repo_front_page' => 'front_page_1.jpg',
            'repo_details' => 'Una guía completa para estudiantes de pastelería.',
            'repo_url' => 'http://example.com/repo1',
            'repo_file' => 'repo1.pdf',
            'repo_categories' => 'Cocina, Pastelería',
            'repo_tags' => 'pastelería, cocina, guía',
            'repo_available' => true,
        ]);
        $repo1->client()->associate($client1);
        $repo1->save();

        $repo2 = Repository::create([
            'client_id' => $client2->id,
            'repo_code' => $faker->isbn10(),
            'repo_isbn' => $faker->isbn13(),
            'repo_title' => 'Manual de Cocina Saludable',
            'repo_display' => 'Cocina Saludable - Manual',
            'repo_type' => 'Ebook',
            'repo_format' => 'ePub',
            'repo_author' => 'Carlos Pérez Gómez',
            'repo_editorial' => 'Editorial Salud y Vida',
            'repo_year' => 2021,
            'repo_pages' => 200,
            'repo_front_page' => 'front_page_2.jpg',
            'repo_details' => 'Manual para una cocina más saludable.',
            'repo_url' => 'http://example.com/repo2',
            'repo_file' => 'repo2.epub',
            'repo_categories' => 'Cocina, Salud',
            'repo_tags' => 'cocina, saludable, manual',
            'repo_available' => true,
        ]);
        $repo2->client()->associate($client2);
        $repo2->save();

        $repo3 = Repository::create([
            'client_id' => $client3->id,
            'repo_code' => $faker->isbn10(),
            'repo_isbn' => $faker->isbn13(),
            'repo_title' => 'Técnicas de Repostería Moderna',
            'repo_display' => 'Repostería Moderna - Técnicas',
            'repo_type' => 'Ebook',
            'repo_format' => 'PDF',
            'repo_author' => 'Lucía Fernández Martínez',
            'repo_editorial' => 'Gastronomía y Arte Editorial',
            'repo_year' => 2019,
            'repo_pages' => 180,
            'repo_front_page' => 'front_page_3.jpg',
            'repo_details' => 'Explora las técnicas más modernas en repostería.',
            'repo_url' => 'http://example.com/repo3',
            'repo_file' => 'repo3.pdf',
            'repo_categories' => 'Cocina, Repostería',
            'repo_tags' => 'repostería, moderna, técnicas',
            'repo_available' => true,
        ]);
        $repo3->client()->associate($client3);
        $repo3->save();

    }
}
