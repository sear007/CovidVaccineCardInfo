<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            ['name' => 'Banteay Meanchey'],
            ['name' => 'Battambang'],
            ['name' => 'Kampong Cham'],
            ['name' => 'Kampong Chhnang'],
            ['name' => 'Kampong Speu'],
            ['name' => 'Kampong Thom'],
            ['name' => 'Kandal'],
            ['name' => 'Kep'],
            ['name' => 'Koh Kong'],
            ['name' => 'Kratie'],
            ['name' => 'Mondulkiri'],
            ['name' => 'Oddar Meanchey'],
            ['name' => 'Pailin'],
            ['name' => 'Phnom Penh'],
            ['name' => 'Preah Vihear'],
            ['name' => 'Prey Veng'],
            ['name' => 'Pursat'],
            ['name' => 'Ratanakiri'],
            ['name' => 'Siem Reap'],
            ['name' => 'Sihanoukville'],
            ['name' => 'Stung Treng'],
            ['name' => 'Svay Rieng'],
            ['name' => 'Takeo'],
            ['name' => 'Tbong Khmum'],
        ]);
    }
}
