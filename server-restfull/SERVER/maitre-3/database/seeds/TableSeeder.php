<?php

use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table')->delete();

        
		$users =
		        
		array(

		[
		'codeTable' => '0001',
		'status_codeStatus' => 7,		            
		'token' => 'pv40jVgG7Pj2oXdsCimlvg0dboCx70flumIRBemnySWSFM3CtSfnwkznZt9q',
		'description' => 'Mesa A',	       
		],			

		[
		'codeTable' => '0002',
		'status_codeStatus' => 7,		            
		'token' => 'kLWLGkiGWooK2IhnDUHDYNJ4YXOYFmVDNsNYHD2sz5N5ZaR32UGbyasunEto',	       
		'description' => 'Mesa B',
		],

		[
		'codeTable' => '0003',
		'status_codeStatus' => 7,		            
		'token' => 'BDWOcepad96Xebly5pPVVI2tmBzfnRuMA8U6unclQXCFe6Zmx5pfzmqbtsmd',
		'description' => 'Mesa C',	       
		],

		[
		'codeTable' => '0004',
		'status_codeStatus' => 7,		            
		'token' => 'eiPZcyxpduabcrJVTlVapk7k5fOQU1HfpdcRvmxZd8f95SryvUH1PrGvNSRI',
		'description' => 'Mesa D',	       
		],

		[
		'codeTable' => '0005',
		'status_codeStatus' => 7,		            
		'token' => '02ZB3E2qmhQ9OzPH8UgP9FjkRlYhQZEKqfmdcdfoWcPfl9mKkbg9h9BYelix',
		'description' => 'Mesa E',	       
		],

		[
		'codeTable' => '0006',
		'status_codeStatus' => 7,		            
		'token' => 'QkmwyrxeLysUX5QNb2kgBl4LmZaWAjcrX6O23fu6ybtvQwEUVUQwi0QAKc9v',
		'description' => 'Mesa F',	       
		],			

		[
		'codeTable' => '0007',
		'status_codeStatus' => 7,		            
		'token' => 'JW2tEBJyaHVzGfNfHSWE7Euqxp56p5c0TA5PMaQhl62PDADRCTK2R2h78mPh',	
		'description' => 'Mesa G',       
		],

		[
		'codeTable' => '0008',
		'status_codeStatus' => 7,		            
		'token' => 'pDEm32bOeckHBerSPwvT7xeKEQMvxq0s8psxS6RWdDd2mBH2mnhnnQQmFZ3g',	
		'description' => 'Mesa H',       
		],

		[
		'codeTable' => '0009',
		'status_codeStatus' => 7,		            
		'token' => 'Dwex4p9tSKoXwIXCH6MVmGHW9XidRBjp2hAhlqJBtSMwYGR3Bhp4ejiOVaWe',	
		'description' => 'Mesa I',       
		],

		[
		'codeTable' => '0010',
		'status_codeStatus' => 7,		            
		'token' => 'ukR3nv2lVTKqSHEwiHdi2X5SYFSJOlenjhWxwpyH1KdxYxUpNSEL5R959tcq',
		'description' => 'Mesa J',	       
		],		
	

		);

		        
		DB::table('table')->insert($users);
    }
}
