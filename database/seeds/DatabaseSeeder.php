<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class,10)->create();
         $this->call(RoleTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(BrandTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(SubcategoryTableSeeder::class);
         $this->call(ColorTableSeeder::class);
    }
}
