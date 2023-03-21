<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $shopKandal = Shop::whereHas('province', function($query){
                $query->where('name', 'Kandal');
            })->first();

            $shopPursat = Shop::whereHas('province', function($query){
                $query->where('name', 'Pursat');
            })->first();

            Customer::factory()
                ->count(400)
                ->create();

            Customer::factory()
                ->count(100)
                ->create([
                    'shop_id' => $shopKandal->id,
                    'number_vaccinated' => 1,
                ]);

            Customer::factory()
                ->count(100)
                ->create([
                    'shop_id' => $shopPursat->id,
                    'number_vaccinated' => 2,
                ]);
    }
}
