<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();

        
		$status =
		        
		array(

		[
		            
		'codeStatus' => 1,		            
		'nameStatus' => 'Ativo',
		'description' => 'Usuário ativo no sistema',

		],

		[

		'codeStatus' => 2,		            
		'nameStatus' => 'Desativado',
		'description' => 'Usuário desativado no sistema',

		],

		[

		'codeStatus' => 3,		            
		'nameStatus' => 'Aberto',
		'description' => 'Comanda aberta para escolhas',

		],

		[

		'codeStatus' => 4,		            
		'nameStatus' => 'Em andamento',
		'description' => 'Comanda fechada com entrada na fila',

		],

		[

		'codeStatus' => 5,		            
		'nameStatus' => 'Finalizado',
		'description' => 'Pedido de comanda saindo da cozinha',

		],

		[

		'codeStatus' => 6,		            
		'nameStatus' => 'Mesa Ocupada',
		'description' => 'Token da mesa em uso',

		],

		[

		'codeStatus' => 7,		            
		'nameStatus' => 'Mesa Livre',
		'description' => 'Token da Mesa liberado',

		],

		);

		        
		DB::table('status')->insert($status);
    }
}
