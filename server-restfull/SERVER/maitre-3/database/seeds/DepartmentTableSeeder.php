<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->delete();

        
		$department =
		        
		array([
		            
		'codeDepartment' => '0000',		            
		'nameDepartment' => 'Sistema',		            
		'description' => 'Sistema',
		        
		],
		        
		[
		            
		'codeDepartment' => '0001',		            
		'nameDepartment' => 'Gerencia',		            
		'description' => 'Setor de Gerenciamento',
		        
		],
		        
		[
		            
		'codeDepartment' => '0002',		            
		'nameDepartment' => 'Administração',		            
		'description' => 'Setor Administrativo',

		],

		[

		'codeDepartment' => '0003',		            
		'nameDepartment' => 'Cozinha',		            
		'description' => 'Setor de Operações',
		        
		]);

		        
		DB::table('department')->insert($department);
    }
}
