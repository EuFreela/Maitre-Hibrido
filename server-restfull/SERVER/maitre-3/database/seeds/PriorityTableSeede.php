<?php

use Illuminate\Database\Seeder;

class PriorityTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priority')->delete();

        
		$priority =
		        
		array([
		            
		'codPriority' => 0,		            
		'namePriority' => 'Ordem de Chegada',		            
		'description' => '',
		        
		],
		        
		[
		            
		'codePriority' => 1,		            
		'namePriority' => 'Urgente',
		'description' => '',
		        
		],
		        
		[
		            
		'codPriority' => 2,		            
		'namePriority' => 'Em Aguardo',	            
		'description' => '',
		        
		]);

		        
		DB::table('priority')->insert($priority);
    }
}
