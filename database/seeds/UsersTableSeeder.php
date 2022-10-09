<?php
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = factory(User::class)->create([
            'name' => 'Mohamed Gharib',
            'email' => 'mohamed.gharib@amwal.com',
            'phone' => '01014503418',
            'type'  => '0' ,
            'password' =>'12345678',
            'active' => true,
    
        ] , 
        [
            'name' => 'Abdallah',
            'email' => 'abdallah.gharib@amwal.com',
            'phone' => '01014503416',
            'type'  => '0' ,
            'password' =>'12345678',
            'active' => true,
    
        ]);
        // factory(User::class, 20)->create();
    }
}
