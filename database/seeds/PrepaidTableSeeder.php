<?php

use App\Models\Prepaid;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PrepaidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Prepaid $prepaid */
        // $prepaid = factory(Prepaid::class)->create([
        //     'user_service_number' => '123456',
        //     'status' => '1',
        //     'service_id' => '1',
        //     'category_id'  => '1' ,
        //     'company_id' =>'1',
        //     'pos_id' => '1',
        //     'value' => 'null',
        //     'created_at'  => '2/2/2020' ,
        //     'updated_at' =>'2/2/2020',
        // ]);
        factory(Prepaid::class, 20)->create();
    }
}
