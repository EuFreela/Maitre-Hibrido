<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Command;
use App\Models\SystemMessage;
use Illuminate\Support\Facades\DB;
use DateTime;

class CommandController extends Controller
{


    public function addCommand($codeMenu,$amount,$token){

    	$menu = Menu::where('codeMenu',$codeMenu)->get()[0];
    	$table = Table::where('token',$token)->get()[0];

    	if( $menu and $token ):

    		$command = Command::create([
    			'menu_codeMenu' => $codeMenu,
    			'amount'=>$amount,
    			'table_token' => $token,
                'status'=>3, 
    			]);

    		if( $command ){
    			return redirect()->route('fr-home')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',36)->get()[0]['alert']);
             }    		

        	else

        		return redirect()->route('fr-home')
                            ->with('flash_msg',SystemMessage::select('alert')->where('code',35)->get()[0]['alert']);

        	endif;


    }



    public function myCommand()
    { 
        $token = Table::where('ip',$_SERVER['REMOTE_ADDR'])->get()[0]->token;

        $join_command = DB::table('command')
             ->join('menu', 'menu.codeMenu', '=', 'command.menu_codeMenu')
             ->join('status', 'status.codeStatus','=','command.status')
             ->select('command.idCommand','command.amount','command.status','status.description','status.nameStatus','menu.titleMenu','menu.amount as price','menu.setup_time')
             ->where(['table_token'=>$token])
             ->orderby('status')
             ->get();
       

        return view('frontend.mycommand',
            [
                'mycommand' => $join_command,
                'token' => $token,
            ]);
    }


    public function destroy($id,$token)
    {
       if( Command::where(['idCommand'=>$id,'table_token'=>$token])->delete() ):

            return redirect()->route('fr-mycommand')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',37)->get()[0]['alert']);
        else:

            return redirect()->route('fr-mycommand')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',38)->get()[0]['alert']);

        endif;
    }


    public function erase($token)
    {
        if( Command::where('table_token',$token)->delete() ):

            return redirect()->route('fr-home')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',37)->get()[0]['alert']);
        else:

            return redirect()->route('fr-home')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',38)->get()[0]['alert']);

        endif;
    }


    public function send($token)
    {
        if( Command::where(['table_token'=>$token,'status'=>3])->update(['status'=>4]) ):

            return redirect()->route('fr-mycommand')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',39)->get()[0]['alert']);
        else:

            return redirect()->route('fr-mycommand')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',40)->get()[0]['alert']);

        endif;
    }
}
