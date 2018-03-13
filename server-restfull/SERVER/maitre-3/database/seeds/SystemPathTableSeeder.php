<?php

use Illuminate\Database\Seeder;

class SystemPathTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_path')->delete();

        
		$users =
		        
		array(

		[
		'code' => '0001',		            
		'path' => 'app_img/product/',		
		'description' => 'Diretório das imagens dos produtos',		       
		],			

		[
		'code' => '0002',		            
		'path' => 'app_img/category/',		
		'description' => 'Diretório das imagens das categrias',		       
		],	

		[
		'code' => '0003',		            
		'path' => 'app_img/qrcode/',		
		'description' => 'Diretório das imagens dos qrcodes',		       
		],

		);

		        
		DB::table('system_path')->insert($users);
    }
}
