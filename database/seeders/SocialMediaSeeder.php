<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deputies = DB::table('deputy')->get();
        foreach ($deputies as $deputy) {
            $response = Http::get("http://dadosabertos.almg.gov.br/ws/deputados/{$deputy->deputy_id}?formato=json");
            $deputyInfo = $response->json();
            $socialMediaData = [];
            if (isset($deputyInfo['deputado']['redesSociais'])) {
                foreach ($deputyInfo['deputado']['redesSociais'] as $socialMedia) {
                    $socialMediaName = $socialMedia['redeSocial']['nome'];

                    $socialMediaData[] = [
                        'deputy_id' => $deputy->id,
                        'social_media' => $socialMediaName,
                    ];
                }
                DB::table('social_media_deputies')->insert($socialMediaData);
            }
        }
    }
}
