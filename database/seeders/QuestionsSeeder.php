<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'id' => 1,
            'question' => 'À quelle fréquence utilisez-vous notre produit / service ?',
            'questionnaire_id' => 1,
            'rang' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'id' => 2,
            'question' => 'Le produit vous aide-t-il à atteindre vos objectifs ?',
            'questionnaire_id' => 1,
            'rang' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'id' => 3,
            'question' => 'Qu’est-ce que vous aimez le plus dans notre produit / service ?',
            'questionnaire_id' => 1,
            'rang' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'id' => 4,
            'question' => 'Si vous pouviez améliorer quelque chose, que serait-ce ?',
            'questionnaire_id' => 1,
            'rang' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'id' => 5,
            'question' => 'Pouvez-vous nous décrire votre opinion sur notre marque ?',
            'questionnaire_id' => 1,
            'rang' => 5,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
