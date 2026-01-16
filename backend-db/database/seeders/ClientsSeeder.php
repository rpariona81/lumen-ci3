<?php

namespace Database\Seeders;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client1 = Client::create(
            [
                'client_ruc_uid'    => '123456789011',
                'client_email'      => 'client01@example.com',
                'client_name'       => 'Client 01',
                'client_logo'       => 'logo_client_01.png',
                'client_verified_at'=> Carbon::now(),
                'client_display'    => 'Client 01 Display Name',
                'client_date_license'=> Carbon::now()->addYear(),
                'client_weburl'     => 'https://www.client01.com',
                'client_subdomain'  => 'client01'
           ]            
        );
        $client2 = Client::create(
            [
                'client_ruc_uid'    => '100456789011',
                'client_email'      => 'client02@example.com',
                'client_name'       => 'Client 02',
                'client_logo'       => 'logo_client_02.png',
                'client_verified_at'=> Carbon::now(),
                'client_display'    => 'Client 02 Display Name',
                'client_date_license'=> Carbon::now()->addYear(),
                'client_weburl'     => 'https://www.client02.com',
                'client_subdomain'  => 'client02'
           ]            
        );
        $client3 = Client::create(
            [
                'client_ruc_uid'    => '123456789013',
                'client_email'      => 'client03@example.com',
                'client_name'       => 'Client 03',
                'client_logo'       => 'logo_client_03.png',
                'client_verified_at'=> Carbon::now(),
                'client_display'    => 'Client 03 Display Name',
                'client_date_license'=> Carbon::now()->addYear(),
                'client_weburl'     => 'https://www.client03.com',
                'client_subdomain'  => 'client03'
           ]            
        );
    }
}
