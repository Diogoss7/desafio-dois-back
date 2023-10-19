<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class DeputyExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deputies = DB::table('deputy')->get();
        $months = range(1, 12);

        foreach ($deputies as $deputy) {

            foreach ($months as $month) {

                $response = Http::get("http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/{$deputy->deputy_id}/2023/{$month}?formato=json");
                $expense = $response->json();

                $totalExpense = 0;
                if (isset($expense['list']) && !empty($expense['list'])) {
                    foreach ($expense['list'] as $expense) {
                        $totalExpense += $expense['valor'];
                    }
                }

                if ($totalExpense) {
                    DB::table('deputy_expense')->insert(
                        [
                            'deputy_id' => $deputy->id,
                            'Month' => $month,
                            'value' => $totalExpense,
                        ]
                    );
                }
            }
        }
    }
}
