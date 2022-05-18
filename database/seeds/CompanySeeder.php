<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Company::factory(100)->create();
        Company::create([
            'name'      =>  'Aman',
            'address'   =>  'moskowsky mir7',
            'phone'     =>  '65000999'
        ]);
    }
}
