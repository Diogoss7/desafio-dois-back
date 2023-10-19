<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class DeputiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json');
        $data = $response->json();

        foreach ($data['list'] as $deputyData) {
            DB::table('deputy')->insert([
                'deputy_id' => $deputyData['id'],
                'name' => $deputyData['nome'],
            ]);
        }
    }
}
