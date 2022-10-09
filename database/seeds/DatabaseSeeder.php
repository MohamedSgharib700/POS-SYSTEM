<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PrepaidTableSeeder::class);
        $this->call(PostpaidSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(PosSeeder::class);
        // factory(App\Models\User::class,10)->create();
    }
}
