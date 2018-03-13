<?php

use Illuminate\Database\Seeder;

class SystemMessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_message')->delete();

        
		$users =
		        
		array(
		[
		'code' => 1,		            
		'type' => '200',		
		'alert' => 'Sucesso! Usuário gravado com sucesso',		       
		],

		[		   
		'code' => 2,         
		'type' => '200',			            
		'alert' => 'Sucesso! Usuário editado com sucesso',
		],

		[	
		'code' => 3,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível criar o usuário',
		],

		[	
		'code' => 4,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível editar o usuário',
		],

		[	
		'code' => 5,	            
		'type' => '404',			            
		'alert' => 'Erro! Usuário não encontrado',
		],

		[	
		'code' => 6,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Produto cadastrado com sucesso',
		],

		[	
		'code' => 7,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível cadastrar o produto',
		],

		[	
		'code' => 8,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Produto editado com sucesso',
		],

		[	
		'code' => 9,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível editar o produto',
		],

		[	
		'code' => 10,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Usuário excluído com sucesso',
		],

		[	
		'code' => 11,	            
		'type' => '404',			            
		'alert' => 'Erro! Erro ao tentar excluir este usuário',
		],

		[	
		'code' => 12,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Produto excluído com sucesso',
		],

		[	
		'code' => 13,	            
		'type' => '404',			            
		'alert' => 'Erro! Erro ao tentar excluir produto',
		],

		[	
		'code' => 14,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Categoria criada com sucesso',
		],

		[	
		'code' => 15,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível criar a categoria',
		],

		[	
		'code' => 16,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Categoria editada com sucesso',
		],

		[	
		'code' => 17,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível editar categoria',
		],

		[	
		'code' => 18,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Categoria excluída com sucesso',
		],


		[	
		'code' => 19,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível excluir a categoria',
		],

		[	
		'code' => 20,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Credenciais editadas com sucesso. No próximo login você usará as novas credenciais.',
		],

		[	
		'code' => 21,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível editar as credenciais',
		],

		[	
		'code' => 22,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Menu criado com sucesso.',
		],

		[	
		'code' => 23,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível criar o menu',
		],

		[	
		'code' => 24,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Menu alterado com sucesso',
		],

		[	
		'code' => 25,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível alterar o menu',
		],


		[	
		'code' => 26,	            
		'type' => '200',			            
		'alert' => 'Secesso! O menu foi excluído com sucesso',
		],



		[	
		'code' => 27,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível excluir o menu',
		],


		[	
		'code' => 28,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Mesa cadastrada com sucesso',
		],


		[	
		'code' => 29,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível cadastrar a mesa',
		],


		[	
		'code' => 30,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Mesa editada com sucesso',
		],


		[	
		'code' => 31,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível editar a mesa',
		],


		[	
		'code' => 32,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Mesa excluida com sucesso',
		],


		[	
		'code' => 33,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível excluir a mesa',
		],

		[	
		'code' => 34,	            
		'type' => '404',			            
		'alert' => 'Erro! Existem produtos criados com esta categoria. Não é possível excluí-la exceto se excluir primeiro o(s) produto(s) que tenha(m) esta categoria. ',
		],

		[	
		'code' => 35,	            
		'type' => '404',			            
		'alert' => 'Erro! Opção inválida. ',
		],

		[	
		'code' => 36,	            
		'type' => '200',			            
		'alert' => 'Sucesso! O item foi adicionado em sua comanda. ',
		],

		[	
		'code' => 37,	            
		'type' => '200',			            
		'alert' => 'Sucesso! O item foi excluido de sua comanda. ',
		],

		[	
		'code' => 38,	            
		'type' => '404',			            
		'alert' => 'Erro! Não foi possível excluir o item de sua comanda. ',
		],

		[	
		'code' => 39,	            
		'type' => '200',			            
		'alert' => 'Sucesso! A comanda foi enviada com sucesso. Acompanhe seu pedido. ',
		],

		[	
		'code' => 40,	            
		'type' => '404',			            
		'alert' => 'Erro! Esta comanda não esta aberta. É possível estar em andamento ou finalizada. ',
		],

		[	
		'code' => 41,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Mesa adicionada ao grupo de ocupados. Reserva concluída. ',
		],

		[	
		'code' => 42,	            
		'type' => '404',			            
		'alert' => 'Erro! Esta mesa não foi reservada. ',
		],

		[	
		'code' => 43,	            
		'type' => '200',			            
		'alert' => 'Sucesso! Pedido finalizado com sucesso. Enviado para despacho. ',
		],

		[	
		'code' => 44,	            
		'type' => '404',			            
		'alert' => 'Erro! Pedido não pode ser finalizado. ',
		],

		[	
		'code' => 45,	            
		'type' => '404',			            
		'alert' => 'Erro! Esta mesa não existe. ',
		],




		);

		        
		DB::table('system_message')->insert($users);
    }
}
