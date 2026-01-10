<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Catalog;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catalog1 = Catalog::create([
            'catalog_name' => 'Undergraduate Programs',
            'catalog_description' => 'Programs leading to a bachelor\'s degree.',
            'catalog_code' => 'UG2024',
            'catalog_alias' => 'Undergrad',
            'catalog_display' => 'Undergraduate Programs'
        ]);

        $catalog2 = Catalog::create([
            'catalog_name' => 'Graduate Programs',
            'catalog_description' => 'Programs leading to a master\'s or doctoral degree.',
            'catalog_code' => 'GR2024',
            'catalog_alias' => 'Grad',
            'catalog_display' => 'Graduate Programs'
        ]);

        $catalog3 = Catalog::create([
            'catalog_name' => 'Professional Certifications',
            'catalog_description' => 'Certification programs for professional development.',
            'catalog_code' => 'PC2024',
            'catalog_alias' => 'ProfCert',
            'catalog_display' => 'Professional Certifications'
        ]); 

        $catalog4 = Catalog::create([
            'catalog_name' => 'Online Courses',
            'catalog_description' => 'Courses offered in an online format.',
            'catalog_code' => 'OC2024',
            'catalog_alias' => 'Online',
            'catalog_display' => 'Online Courses'
        ]);

        $catalog5 = Catalog::create([
            'catalog_name' => 'Short-term Workshops',
            'catalog_description' => 'Intensive workshops on specific topics.',
            'catalog_code' => 'SW2024',
            'catalog_alias' => 'Workshops',
            'catalog_display' => 'Short-term Workshops'
        ]);
        
    }
}
