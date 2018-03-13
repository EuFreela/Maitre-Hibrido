<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Command;
use App\Models\SystemMessage;
use Illuminate\Support\Facades\DB;
use Validator;

class APIController extends Controller
{
	

    /*-----------------------------------------------------------------------------------
    |   TABLES
    */
    public function getMenu($table_token)
    {
        if( Table::where('token',$table_token)->first() ){
            
            //LISTAR MENU
            $menu = Menu::get();

            if( Table::where('token',$table_token)->where('status_codeStatus',7)->first() ){
                //OCUPANDO MESA
                Table::where('token',$table_token)->update(['status_codeStatus'=>6,'ip'=>$_SERVER['REMOTE_ADDR']]);
            }

            return response()->json( $menu );

        }else{
            return response()->json(
                [
                    'type'=>'404',
                    'alert'=>'Erro! Esta mesa esta ocupada ou ainda nao foi liberada.'
                ]);
        }
    }

   public function addCommand($codeMenu,$amount,$table_token)
   {

        $menu = Menu::where('codeMenu',$codeMenu)->get()[0];
        $table = Table::where('token',$table_token)->get()[0];


        if( $menu and $table_token ):

            $command = Command::create([
                'menu_codeMenu' => $codeMenu,
                'amount'=>$amount,
                'table_token' => $table_token,
                'status'=>3, 
                ]);

            if( $command ){

                return response()->json(
                    [
                        'type'=>'200',
                        'alert'=>'Sucesso! Comanda adicionada com sucesso',
                    ]);

             }          

        else

            return response()->json(
                    [
                        'type'=>'404',
                        'alert'=>'Erro! Nao foi possivel adicionar o item na comanda',
                    ]);

        endif;

   }

   public function getCommand($table_token)
   {
        $join_command = DB::table('command')
             ->join('menu', 'menu.codeMenu', '=', 'command.menu_codeMenu')
             ->join('status', 'status.codeStatus','=','command.status')
             ->select('command.idCommand','command.amount','command.status','status.description','status.nameStatus','menu.titleMenu','menu.amount as price','menu.setup_time')
             ->where(['table_token'=>$table_token])
             ->orderby('status')
             ->get();

        return response()->json( $join_command );
   }

   public function sendCommand($table_token)
   {

        if( Command::where(['table_token'=>$table_token,'status'=>3])->update(['status'=>4]) ):

            return response()->json(
                [
                    'type'=>'200',
                    'alert'=>'Sucesso! Comanda enviada com sucesso. Aguarde seu pedido.',
                ]);
        else:

            return response()->json(
                [
                    'type'=>'404',
                    'alert'=>'Erro! Nao foi possivel enviar a comanda ou esta comanda encontra-se em andamento.',
                ]);

        endif;

   }

   public function destroyItemCommand($id,$table_token)
   {

        if( Command::where(['idCommand'=>$id,'table_token'=>$table_token,'status'=>3])->delete() ):

            return response()->json(
                [
                    'type'=>'200',
                    'alert'=>'Sucesso! Item da comanda excluido com sucesso.'
                ]);
        else:

             return response()->json(
                [
                    'type'=>'404',
                    'alert'=>'Erro! Nao foi possivel excluir o item da comanda. O item talvez nao exista ou seu status esteja em andamento.'
                ]);

        endif;
   }


}
