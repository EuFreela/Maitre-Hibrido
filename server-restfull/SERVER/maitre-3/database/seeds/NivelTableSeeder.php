<?php

use Illuminate\Database\Seeder;

class NivelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel')->delete();

        
		$nivel =
		        
		array([
		            
		'codeNivel' => '0000',		            
		'nameNivel' => 'Root',		            
		'description' => 'Nivel de administração do sistema',
		        
		],
		        
		[
		            
		'codeNivel' => '0001',		            
		'nameNivel' => 'Gerencia',		            
		'description' => 'Nivel de gerencia',
		        
		],
		        
		[
		            
		'codeNivel' => '0002',		            
		'nameNivel' => 'Administrativo',
		'description' => 'Nivel de Administração',
		        
		],

		[
		            
		'codeNivel' => '0003',		            
		'nameNivel' => 'Operacional',
		'description' => 'Nivel de Operações',
		        
		]);

		        
		DB::table('nivel')->insert($nivel);
    }
}
