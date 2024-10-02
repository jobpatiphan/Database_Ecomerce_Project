<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class order_entry_productSample extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_entry_products')->insert([ 
            ['id' =>3,'order_id' => 1,'product_id' => 2,'product_amount'=>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>4,'order_id' => 1,'product_id' => 4,'product_amount'=>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>5,'order_id' => 3,'product_id' => 4,'product_amount'=>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>6,'order_id' => 4,'product_id' => 3,'product_amount'=>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>7,'order_id' => 2,'product_id' => 2,'product_amount'=>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>8,'order_id' => 2,'product_id' => 1,'product_amount'=>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' =>9,'order_id' => 3,'product_id' => 4,'product_amount'=>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]); 
    }
}
