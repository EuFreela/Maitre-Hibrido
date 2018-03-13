<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();

        $product= array(

        	[
        		'category_codeCategory' => '0004',
        		'codeProduct' => '0001',
        		'stockProduct' => '100',
        		'nameProduct' => 'Carne Bovina',
        		'description'	=>	'',
        		'img' => 'carne0020',
        	],

        	[
        		'category_codeCategory' => '0019',
        		'codeProduct' => '0002',
        		'stockProduct' => '100',
        		'nameProduct' => 'Arroz Branco',
        		'description'	=>	'',
        		'img' => 'arroz0019',
        	],

        	[
        		'category_codeCategory' => '0019',
        		'codeProduct' => '0003',
        		'stockProduct' => '100',
        		'nameProduct' => 'Feijão Comum',
        		'description'	=>	'',
        		'img' => 'feijao0019',
        	],

        	[
        		'category_codeCategory' => '0019',
        		'codeProduct' => '0004',
        		'stockProduct' => '100',
        		'nameProduct' => 'Feijão para feijoada',
        		'description'	=>	'',
        		'img' => 'feijoda0019',
        	],

        	
        	[
        		'category_codeCategory' => '0004',
        		'codeProduct' => '0005',
        		'stockProduct' => '100',
        		'nameProduct' => 'Carne Suína',
        		'description'	=>	'',
        		'img' => 'suino0004',
        	],

        	[
        		'category_codeCategory' => '0021',
        		'codeProduct' => '0006',
        		'stockProduct' => '100',
        		'nameProduct' => 'Cenouras',
        		'description'	=>	'',
        		'img' => 'cenoura0021',
        	],

        	[
        		'category_codeCategory' => '0020',
        		'codeProduct' => '0007',
        		'stockProduct' => '100',
        		'nameProduct' => 'Alfaces',
        		'description'	=>	'',
        		'img' => 'alface0020',
        	],

            [
                'category_codeCategory' => '0021',
                'codeProduct' => '0008',
                'stockProduct' => '100',
                'nameProduct' => 'Batata Doce',
                'description'   =>  '',
                'img' => 'batata0021',
            ],

            [
                'category_codeCategory' => '0021',
                'codeProduct' => '0009',
                'stockProduct' => '100',
                'nameProduct' => 'Batata Frita',
                'description'   =>  '',
                'img' => 'batatafrita0021',
            ],

            [
                'category_codeCategory' => '0004',
                'codeProduct' => '0010',
                'stockProduct' => '100',
                'nameProduct' => 'Frango',
                'description'   =>  '',
                'img' => 'frango0004',
            ],

            [
                'category_codeCategory' => '0020',
                'codeProduct' => '0011',
                'stockProduct' => '100',
                'nameProduct' => 'Tomate',
                'description'   =>  '',
                'img' => 'tomate0020',
            ],


             [
                'category_codeCategory' => '0018',
                'codeProduct' => '0012',
                'stockProduct' => '100',
                'nameProduct' => 'Coca-Cola 350ml (Lata)',
                'description'   =>  '',
                'img' => 'cocacola0018',
            ],

             [
                'category_codeCategory' => '0018',
                'codeProduct' => '0013',
                'stockProduct' => '100',
                'nameProduct' => 'Coca-Cola 500ml (Garrafa)',
                'description'   =>  '',
                'img' => 'cc500ml0018',
            ],



        	);

        DB::table('product')->insert($product);



    }
}
