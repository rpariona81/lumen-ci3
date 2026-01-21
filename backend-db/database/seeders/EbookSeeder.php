<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

use App\Models\Client;
use App\Models\Ebook;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $client1 = Client::where('client_name', 'Client 01')->first();
        $client2 = Client::where('client_name', 'Client 02')->first();
        $client3 = Client::where('client_name', 'Client 03')->first();

        $ebook1 = Ebook::create([
            'ebook_code' => '011001',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Guia Del Estudiante Pasteleria',
            'ebook_alias' => 'GUIA DEL ESTUDIANTE PASTELERIA',
            'ebook_display' => 'Pastelería - Guía Del Estudiante',
            'ebook_author' => 'Aida Ludeña Sánchez',
            'ebook_editorial' => 'Centro de Servicios para la Capacitación Laboral y Desarrollo - CAPLAB',
            'ebook_format' => 'PDF',
            'ebook_available' => true,
            'ebook_file' => 'GUIA_DEL_ESTUDIANTE_PASTELERIA.pdf',
            'ebook_tags' => 'Pastelería, Cocina, Repostería'
        ]);
        $ebook1->clients()->attach($client1->id, ['authorized' => true, 'client_ebook_tags' => 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información']);
        $ebook1->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Desarrollo de Sistemas de Información']);
        $ebook1->save();

        $ebook2 = Ebook::create([
            'ebook_code' => '011002',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Manual de Cocina Saludable',
            'ebook_alias' => 'MANUAL DE COCINA SALUDABLE',
            'ebook_display' => 'Cocina Saludable - Manual',
            'ebook_author' => 'Carlos Pérez Gómez',
            'ebook_editorial' => 'Editorial Salud y Vida',
            'ebook_format' => 'ePub',
            'ebook_available' => true,
            'ebook_file' => 'MANUAL_DE_COCINA_SALUDABLE.epub',
            'ebook_tags' => 'Cocina Saludable, Nutrición, Bienestar'
        ]);
        $ebook2->clients()->attach($client1->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook2->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook2->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook2->save();

        $ebook3 = Ebook::create([
            'ebook_code' => '011003',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Técnicas de Repostería Moderna',
            'ebook_alias' => 'TÉCNICAS DE REPOSTERÍA MODERNA',
            'ebook_display' => 'Repostería Moderna - Técnicas',
            'ebook_author' => 'Lucía Fernández Martínez',
            'ebook_editorial' => 'Gastronomía y Arte Editorial',
            'ebook_format' => 'PDF',
            'ebook_available' => true,
            'ebook_file' => 'TECNICAS_DE_REPOSTERIA_MODERNA.pdf',
            'ebook_tags' => 'Repostería, Técnicas, Cocina'
        ]);
        $ebook3->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook3->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook3->save();

        $ebook4 = Ebook::create([
            'ebook_code' => '011004',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Cocina Internacional para Principiantes',
            'ebook_alias' => 'COCINA INTERNACIONAL PARA PRINCIPIANTES',
            'ebook_display' => 'Cocina Internacional - Principiantes',
            'ebook_author' => 'María López Rodríguez',
            'ebook_editorial' => 'Mundo Culinario Editorial',
            'ebook_format' => 'ePub',
            'ebook_available' => true,
            'ebook_file' => 'COCINA_INTERNACIONAL_PARA_PRINCIPIANTES.epub',
            'ebook_tags' => 'Cocina Internacional, Cocina, Recetas'
        ]);
        $ebook4->clients()->attach($client1->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook4->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook4->save();

        $ebook5 = Ebook::create([
            'ebook_code' => '011005',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Fundamentos de la Cocina Vegetariana',
            'ebook_alias' => 'FUNDAMENTOS DE LA COCINA VEGETARIANA',
            'ebook_display' => 'Cocina Vegetariana - Fundamentos',
            'ebook_author' => 'Javier Ramírez Sánchez',
            'ebook_editorial' => 'Vida Saludable Editorial',
            'ebook_format' => 'PDF',
            'ebook_available' => true,
            'ebook_file' => 'FUNDAMENTOS_DE_LA_COCINA_VEGETARIANA.pdf',
            'ebook_tags' => 'Cocina Vegetariana, Saludable, Nutrición'
        ]);
        $ebook5->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook5->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Farmacia Técnica']);
        $ebook5->save();

        $ebook6 = Ebook::create([
            'ebook_code' => '011006',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Postres y Dulces Tradicionales',
            'ebook_alias' => 'POSTRES Y DULCES TRADICIONALES',
            'ebook_display' => 'Dulces Tradicionales - Postres',
            'ebook_author' => 'Ana Gómez Torres',
            'ebook_editorial' => 'Sabores del Mundo Editorial',
            'ebook_format' => 'ePub',
            'ebook_available' => true,
            'ebook_file' => 'POSTRES_Y_DULCES_TRADICIONALES.epub',
            'ebook_tags' => 'Postres, Dulces, Repostería'
        ]);
        $ebook6->clients()->attach($client1->id, ['authorized' => true, 'client_ebook_tags' => 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información']);
        $ebook6->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Desarrollo de Sistemas de Información']);
        $ebook6->save();

        $ebook7 = Ebook::create([
            'ebook_code' => '011007',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Cocina Rápida y Fácil para Todos',
            'ebook_alias' => 'COCINA RÁPIDA Y FÁCIL PARA TODOS',
            'ebook_display' => 'Cocina Rápida - Fácil para Todos',
            'ebook_author' => 'Sofía Hernández Ruiz',
            'ebook_editorial' => 'Editorial Cocina Práctica',
            'ebook_format' => 'PDF',
            'ebook_available' => true,
            'ebook_file' => 'COCINA_RAPIDA_Y_FACIL_PARA_TODOS.pdf',
            'ebook_tags' => 'Cocina Rápida, Fácil, Recetas'
        ]);
        $ebook7->clients()->attach($client1->id, ['authorized' => true, 'client_ebook_tags' => 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información']);
        $ebook7->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Desarrollo de Sistemas de Información']);
        $ebook7->save();

        $ebook8 = Ebook::create([
            'ebook_code' => '011008',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Cocina Gourmet para Ocasiones Especiales',
            'ebook_alias' => 'COCINA GOURMET PARA OCASIONES ESPECIALES',
            'ebook_display' => 'Cocina Gourmet - Ocasiones Especiales',
            'ebook_author' => 'Diego Martínez López',
            'ebook_editorial' => 'Gastronomía de Lujo Editorial',
            'ebook_format' => 'ePub',
            'ebook_available' => true,
            'ebook_file' => 'COCINA_GOURMET_PARA_OCASIONES_ESPECIALES.epub',
            'ebook_tags' => 'Cocina Gourmet, Lujo, Recetas'
        ]);
        $ebook8->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook8->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Farmacia Técnica']);
        $ebook8->save();

        $ebook9 = Ebook::create([
            'ebook_code' => '011009',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Cocina Internacional Avanzada',
            'ebook_alias' => 'COCINA INTERNACIONAL AVANZADA',
            'ebook_display' => 'Cocina Internacional - Avanzada',
            'ebook_author' => 'Elena Sánchez García',
            'ebook_editorial' => 'Mundo Culinario Editorial',
            'ebook_format' => 'PDF',
            'ebook_available' => true,
            'ebook_file' => 'COCINA_INTERNACIONAL_AVANZADA.pdf',
            'ebook_tags' => 'Cocina Internacional, Avanzada, Recetas'
        ]);
        $ebook9->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook9->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Farmacia Técnica']);
        $ebook9->save();

        $ebook10 = Ebook::create([
            'ebook_code' => '011010',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Técnicas de Cocina Profesional',
            'ebook_alias' => 'TÉCNICAS DE COCINA PROFESIONAL',
            'ebook_display' => 'Cocina Profesional - Técnicas',
            'ebook_author' => 'Fernando Ruiz Pérez',
            'ebook_editorial' => 'Gastronomía y Arte Editorial',
            'ebook_format' => 'ePub',
            'ebook_available' => true,
            'ebook_file' => 'TECNICAS_DE_COCINA_PROFESIONAL.epub',
            'ebook_tags' => 'Cocina Profesional, Técnicas, Gastronomía'
        ]);
        $ebook10->clients()->attach($client1->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook10->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Farmacia Técnica']);
        $ebook10->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Laboratorio Clínico']);
        $ebook10->save();

        $ebook11 = Ebook::create([
            'ebook_code' => '011011',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Cocina Saludable para Niños',
            'ebook_alias' => 'COCINA SALUDABLE PARA NIÑOS',
            'ebook_display' => 'Cocina Saludable - Niños',
            'ebook_author' => 'Laura Torres Mendoza',
            'ebook_editorial' => 'Editorial Salud y Vida',
            'ebook_format' => 'PDF',
            'ebook_available' => true,
            'ebook_file' => 'COCINA_SALUDABLE_PARA_NINOS.pdf',
            'ebook_tags' => 'Cocina Saludable, Niños, Nutrición'
        ]);
        $ebook11->clients()->attach($client1->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook11->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Farmacia Técnica']);
        $ebook11->save();

        $ebook12 = Ebook::create([
            'ebook_code' => '011012',
            'ebook_isbn' => $faker->isbn13(),
            'ebook_title' => 'Repostería Creativa para Fiestas',
            'ebook_alias' => 'REPOSTERÍA CREATIVA PARA FIESTAS',
            'ebook_display' => 'Repostería Creativa - Fiestas',
            'ebook_author' => 'Marta Ramírez Vázquez',
            'ebook_editorial' => 'Sabores del Mundo Editorial',
            'ebook_format' => 'ePub',
            'ebook_available' => true,
            'ebook_file' => 'REPOSTERIA_CREATIVA_PARA_FIESTAS.epub',
            'ebook_tags' => 'Repostería Creativa, Fiestas, Celebraciones'
        ]);
        $ebook12->clients()->attach($client1->id, ['authorized' => true, 'client_ebook_tags' => 'Enfermería Técnica']);
        $ebook12->clients()->attach($client2->id, ['authorized' => true, 'client_ebook_tags' => 'Farmacia Técnica']);
        $ebook12->clients()->attach($client3->id, ['authorized' => true, 'client_ebook_tags' => 'Laboratorio Clínico']);
        $ebook12->save();

    }
}
