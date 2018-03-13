<?php

use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_category')->delete();

        
		$mc =
		        
		array([
		            
		'code' => 1,	
		'name' => 'Refeições'
		        
		],
		        
		[
		            
		'code' => 2,	
		'name' => 'Lanches'
		        
		],
		        
		[
		            
		'code' => 3,	
		'name' => 'Bebidas'

		]

		);

		        
		DB::table('menu_category')->insert($mc);
    }
}
