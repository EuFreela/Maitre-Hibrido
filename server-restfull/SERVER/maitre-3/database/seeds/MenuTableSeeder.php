<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('menu')->delete();

        
		$menu = array(
		        
		[
		     
		'product_codeproduct' => '0001',	
		'menucategory_code' => 1,
		'codeMenu' => '0001',
		'titleMenu' => 'Parmergiana',
		'amount' => '12.40',
		'setup_time' => '10:00',
		'description'=> 'Carne bovina, Ovos, farinha de rosca, sal a gosto, alho, extrato de tomate, cebola',	        
		],

		[
		     
		'product_codeproduct' => '0004',	
		'menucategory_code' => 1,
		'codeMenu' => '0002',
		'titleMenu' => 'Brasileirão',
		'amount' => '15.00',
		'setup_time' => '12:00',
		'description'=> 'Arroz, Feijoada, Tomate, Carne Bovina, alface',	        
		],
		
		[
		     
		'product_codeproduct' => '0010',	
		'menucategory_code' => 1,
		'codeMenu' => '0003',
		'titleMenu' => 'Da Casa',
		'amount' => '24.00',
		'setup_time' => '10:00',
		'description'=> 'Arroz, Feijão, Tomate, Carne de Frango, alface, tempero',	        
		],	


		[
		     
		'product_codeproduct' => '0012',	
		'menucategory_code' => 3,
		'codeMenu' => '0004',
		'titleMenu' => 'Coca-Cola 350ml',
		'amount' => '2.50',
		'setup_time' => '00:00',
		'description'=> 'Refrigerante Coca-Cola 350ml',	        
		],	

				[
		     
		'product_codeproduct' => '0013',	
		'menucategory_code' => 3,
		'codeMenu' => '0005',
		'titleMenu' => 'Coca-Cola 500ml',
		'amount' => '4.50',
		'setup_time' => '00:00',
		'description'=> 'Refrigerante Coca-Cola 500ml',	        
		],	


		);

		        
		DB::table('menu')->insert($menu);
    }
}
