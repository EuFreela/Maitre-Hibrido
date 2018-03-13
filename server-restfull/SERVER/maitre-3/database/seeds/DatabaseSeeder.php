<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $this->call(UsersTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(PriorityTableSeede::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(NivelTableSeeder::class);
        $this->call(StatusTableSeeder::class);*/
        
        
       /*$this->call(MenuCategorySeeder::class);

        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(MenuTableSeeder::class);*/
        //$this->call(TableSeeder::class);
        
        //$this->call(SystemPathTableSeeder::class);

        $this->call(SystemMessageTableSeeder::class);
        
        
    }
}
