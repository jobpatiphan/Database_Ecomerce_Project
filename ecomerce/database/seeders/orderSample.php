<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class orderSample extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('orders')->insert([ 
            ['id' =>1,'user_id' => 1,'total_price' => 80.00, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]  
        ]); 
    }
}
