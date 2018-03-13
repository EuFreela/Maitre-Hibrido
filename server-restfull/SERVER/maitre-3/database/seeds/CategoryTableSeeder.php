<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();

        $category = array(

        	[
        		'codeCategory' => '0001',
        		'nameCategory' => 'Charcuteria',
        		'description'	=>	'Charcuteria ou charcutaria (do francês charcuterie, de chair, "carne" e cuit, "cozida"), salsicharia, também conhecida pelo termo italiano salumeria, é o ramo da indústria alimentar dedicado ao preparo e venda de produtos de carne de porco curada, como bacon, presunto, salsichas, terrinas, galantinas, patês e confits.[1] A charcuteria é parte do repertório de garde manger de um chef, originalmente criada como uma maneira de se preservar as carnes antes do advento da refrigeração',
        	],

        	[        		
        		'codeCategory' => '0002',
        		'nameCategory' => 'Fenalâr',
        		'description'	=>	'Carneiro é um nome para um pedaço de carne de coxas , de preferência a partir de ovelha , mas também a partir de outros rebanho , que é curada . processo de Spek leva três meses ou mais.' 
        	],

        	[        		
        		'codeCategory' => '0003',
        		'nameCategory' => 'Fiambre',
        		'description'	=>	'Fiambre um produto obtido pela cozedura de carne de porco curada, seja simples ou processada, que se serve frio em sanduíches, cortado em fatias finas, ou também usado em diversos pratos. É uma palavra adotada do espanhol, onde significa qualquer tipo de produto de carne preparado para ser consumido frio; nessa acepção, inclui todos os produtos de carne curada, incluindo o próprio presunto, os enchidos e outros produtos de salsicharia (equivalente a frios ou “carnes frias”). Em português, também se usa esta palavra para a carne condimentada e cozida de outros animais, como galinha e peru, ou mesmo para produtos de origem vegetal que se podem considerar comparáveis a um fiambre. [1] [2] No Brasil, também se usa esta palavra para o conjunto dos alimentos frios, geralmente de carne, que se preparam para uma viagem.' 
        	],

        	[        		
        		'codeCategory' => '0004',
        		'nameCategory' => 'Frios',
        		'description'	=>	'Frios (português brasileiro) ou carnes frias (português europeu) é o termo utilizado para se referir às carnes pré-cozidas ou curadas, algumas das quais fatiadas e servidas frias, em sanduíches ou como acepipes. São exemplos o fiambre, a mortadela, o paio ou o chouriço, entre muitas outras.' 
        	],

        	[        		
        		'codeCategory' => '0005',
        		'nameCategory' => 'Lardo',
        		'description'	=>	'O “Lardo” é a gordura do porco retirada das costas do animal, na camada embaixo da pele, e que após passar por uma cura com especiarias, transforma-se em uma iguaria muito saborosa. É de se estranhar o consumo de uma gordura dessa maneira, mas é preciso compreender a transformação que ela passa até se transformar no Lardo, e consumido como qualquer outro embutido italiano.' 
        	],

        	[        		
        		'codeCategory' => '0006',
        		'nameCategory' => 'Linguiça',
        		'description'	=>	'A linguiça (AO 1943: lingüiça) é um enchido (embutido) em forma de salsicha, feito de carne de porco, de aves, de carneiro, de carne de bovinos e mesmo peixes ou frutos do mar, temperado com cebola, alho e páprica e outras especiarias. Pode ser consumida fresca após preparada ou sofrer processo de cura e conservação por meio de defumação.' 
        	],

        	[        		
        		'codeCategory' => '0007',
        		'nameCategory' => 'Pastirna',
        		'description'	=>	'Pastırma, bastirma ou basturma é o nome dado em turco a um tipo de carne de bovino muito temperada seca ao ar com origem na Anatólia e que atualmente faz parte da gastronomia dos países que pertenceram ao Império Otomano.' 
        	],

        	[        		
        		'codeCategory' => '0009',
        		'nameCategory' => 'Pastrami',
        		'description'	=>	'O pastrami é uma carne magra curada e muito temperada, que se popularizou nos Estados Unidos (EUA).' 
        	],

        	[        		
        		'codeCategory' => '0010',
        		'nameCategory' => 'Pepproni',
        		'description'	=>	'Pepperoni é uma variedade ítalo-americana apimentada do salame seco, feita de carne de porco e bovina, incluindo algumas vezes toucinho. Os pepperoni são descendentes dos salames apimentados italianos, tais como o picante napolitano do salsiccia, uma salsicha de carne de porco seco picante de Nápoles. Os pepperoni são usados frequentemente como cobertura da pizza em pizzarias do estilo americano. É a cobertura mais popular das pizzas na América do Norte, presente ao menos em 30% de todas as pizzas.' 
        	],

        	[        		
        		'codeCategory' => '0012',
        		'nameCategory' => 'Presunto',
        		'description'	=>	'Presunto é um produto alimentar do ramo da charcutaria, formado pela perna inteira do porco, que é curada, por vezes apenas com sal, outras vezes temperada com condimentos e até fumada. Dependendo do tipo de cura, do grau de secagem e das condições de armazenagem, o presunto pode manter-se com boas características organolépticas durante períodos longos e ser consumido, tanto fatiado em sanduíches ou como aperitivo duma refeição, ou ainda fazendo parte de outra preparação culinária.' 
        	],

        	[        		
        		'codeCategory' => '0013',
        		'nameCategory' => 'Presunto de Barramos',
        		'description'	=>	'Presunto de Barrancos é um presunto tradicional da culinária de Portugal, mais concretamente da vila de Barrancos. Constitui uma denominação de origem protegida, de acordo com as normas da União Europeia.' 
        	],

        	[        		
        		'codeCategory' => '0014',
        		'nameCategory' => 'Presunto de Barramos',
        		'description'	=>	'O presunto ibérico ou presunto de pata negra, é um tipo de presunto curado produzido principalmente em Espanha e Portugal, baseado no porco preto ibérico que também se designa como porco de pata negra ou porco de raça alentejana.' 
        	],

        	[        		
        		'codeCategory' => '0015',
        		'nameCategory' => 'Presunto de Barramos',
        		'description'	=>	'Prosciutto (IPA: [proˈʃutːo]) é o nome italiano que designa um tipo de presunto curado a seco, envelhecido e temperado, costumeiramente fatiado e servido sem cozimento. Na Itália, país de sua origem, é vital a distinção entre prosciutto crudo ("presunto cru") e prosciutto cotto (presunto cozido", mais similar ao presunto dos países lusófonos). A palavra "prosciutto" deriva do latim perexsuctum, que significa "completamente enxugado ou seco".' 
        	],

        	[        		
        		'codeCategory' => '0016',
        		'nameCategory' => 'Skerpikjot',
        		'description'	=>	'Skerpikjøt , um tipo de carne de carneiro secado ao vento, é uma iguaria das ilhas Faroé.' 
        	],

        	[        		
        		'codeCategory' => '0017',
        		'nameCategory' => 'Speck',
        		'description'	=>	'Speck, Südtiroler Speck ou Speck Alto Adige é um presunto cru, levemente fumado, típico da província de Bolzano, no norte da Itália. Constitui um produto de denominação de origem protegida, de acordo com as normas da União Europeia.' 
        	],

        	[        		
        		'codeCategory' => '0018',
        		'nameCategory' => 'Bebida',
        		'description'	=>	'Bebida é um tipo de líquido, o qual é especificamente preparado para consumo humano. Existem muitos tipos de bebidas, que podem ser divididas em vários grupos, tais como água pura, sucos de frutas ou vegetais, bebidas quentes, refrigerantes (bebidas gaseificadas), bebidas alcoólicas. Para além de satisfazer uma necessidade básica, bebidas constituem parte da cultura da sociedade humana.' 
        	],

            [               
                'codeCategory' => '0019',
                'nameCategory' => 'Carboidratos',
                'description'   =>  'Inclui alimentos como feijão, arroz, macarrão.' 
            ],

            [               
                'codeCategory' => '0020',
                'nameCategory' => 'Verdura',
                'description'   =>  'Acompanham o prato.' 
            ],

            [               
                'codeCategory' => '0021',
                'nameCategory' => 'Legumes',
                'description'   =>  'Acompanham o prato.' 
            ],




        	);

        DB::table('category')->insert($category);
    }
}
