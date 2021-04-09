<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();
        
        $plan->tenants()->create([
            'cnpj'  => '09456358000106',
            'name'  => 'Bingo',
            'url'   => 'blingo',
            'email' => 'adebastiani@gmail.com',
        ]);
    }
}
