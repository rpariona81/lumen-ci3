<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;
use App\Models\ViewEbook;
use App\Models\User;

class ViewBookSeeder extends Seeder
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

        $user1 = User::where('email', 'demo@demo.com')->first();
        $user2 = User::where('email', 'admin@demo.com')->first();
        $user3 = User::where('email', 'support@demo.com')->first();

        $view1 = ViewEbook::create([
            'client_id' => $client1->id,
            'ebook_id' => 1,
            'user_id' => $user1->id,
            'viewed' => true,
        ]);
        $view1->save();

        $view2 = ViewEbook::create([
            'client_id' => $client2->id,
            'ebook_id' => 2,
            'user_id' => $user2->id,
            'viewed' => true,
        ]);
        $view2->save();

        $view3 = ViewEbook::create([
            'client_id' => $client3->id,
            'ebook_id' => 3,
            'user_id' => $user3->id,
            'viewed' => true,
        ]);
        $view3->save();

    }
}
