<?php
use App\Models\Postpaid;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostpaidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Postpaid $prepaid */
        // $prepaid = factory(Postpaid::class)->create([
        //     'user_service_number' => '123456',
        //     'status' => '1',
        //     'service_id' => '1',
        //     'category_id'  => '1' ,
        //     'company_id' =>'1',
        //     'pos_id' => '1',
        //     'value' => '200',
        //     'created_at'  => '2/2/2020' ,
        //     'updated_at' =>'2/2/2020',
        // ]);
        factory(Postpaid::class, 20)->create();
    }
}
