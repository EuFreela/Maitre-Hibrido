<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->delete();

        
		$orders =
		        
		array([
		            
		'codOrder' => 0,		            
		'nameOrder' => 'Na Fila',		            
		'description' => '',
		        
		],
		        
		[
		            
		'codOrder' => 1,		            
		'nameOrder' => 'Em Andamento',		            
		'description' => '',
		        
		],
		        
		[
		            
		'codOrder' => 2,		            
		'nameOrder' => 'Em Atraso',
		'description' => '',

		        
		],
		        
		[
		            
		'codOrder' => 3,		            
		'nameOrder' => 'Terminado',		            
		'description' => '',
		        
		]);

		        
		DB::table('order')->insert($orders);
	}
}
