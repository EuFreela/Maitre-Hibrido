<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Command;
use App\Models\SystemMessage;

class KitchenController extends Controller
{
	
	public function __construct()   {}

    public function kitchenList()
    {
    	$command = DB::table('command')
    	->join('table','table.token','=','command.table_token')
    	->join('status','status.codeStatus','=','command.status')
    	->join('menu','menu.codeMenu','=','command.menu_codeMenu')
    	->select('table.description as table','command.table_token','command.idCommand','command.menu_codeMenu','command.amount','status.nameStatus','command.status','menu.titleMenu')
    	->where('status','<',5)
    	->get();

    	return view('backend.kitchen.list',
    		[
    			'command_list' => $command,
    		]);
    }

    public function send($id,$token)
    {


    	 if( Command::where(['table_token'=>$token])->update(['status'=>5]) ):

            //REDUZIR ESTOQUE
            DB::table('product')
                        ->join('menu','menu.product_codeProduct','=','product.codeProduct')
                        ->join('command','command.menu_codeMenu','=','menu.codeMenu')
                        ->where('command.table_token',$token)
                        ->decrement('stockProduct', 1);


            return redirect()->route('ds-kitchen-list')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',43)->get()[0]['alert']);
        else:

            return redirect()->route('ds-kitchen-list')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',44)->get()[0]['alert']);

        endif;
    }


}
