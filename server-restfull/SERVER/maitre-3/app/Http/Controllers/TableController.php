<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Table;
use App\Models\SystemMessage;
use App\Models\SystemPath;
use Illuminate\Support\Facades\DB;
use Image;

class TableController extends Controller
{

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    }

    public function index()
    {
        //
    }

    /*
    |   TABLE -------------------------------------------------------------------------------------------
    */
    public function reserve($token)
    {
        $join_table_status = DB::table('table')
             ->join('status', 'status.codeStatus', '=', 'table.status_codeStatus')
             ->select('status.nameStatus as statusname','status.codeStatus','table.idTable','table.codeTable','table.token','table.img','table.description')
             ->where('token',$token)
             ->get()[0];

        return view('backend.table.reserve',['table'=>$join_table_status]);

    }

    public function postReserve(Request $request)
    {   
        $table = Table::where('token',$request->table_token)->update(
                [
                    'status_codeStatus'=>$request->table,
                    'ip'=>$request->table_ip,
                    'description'=>$request->table_description,
                ]);

        if($table){
            return redirect()->route('ds-table-reserve',$request->table_token)
            ->with('flash_msg_success',SystemMessage::select('alert')->where('code',41)->get()[0]['alert']);
        }else{
            return redirect()->route('ds-table-reserve',$request->table_token)
            ->with('flash_msg_success',SystemMessage::select('alert')->where('code',42)->get()[0]['alert']);
        }
    }



    //---------------------------------------------------------------------------------------------------


    public function tableList()
    {
        $path = SystemPath::select('path')->where('code','=','0003')->get()[0]['path'];

        $join_table_status = DB::table('table')
             ->join('status', 'status.codeStatus', '=', 'table.status_codeStatus')
             ->select('status.nameStatus as statusname','status.codeStatus','table.idTable','table.codeTable','table.token','table.img')
             ->get();

        return view('backend.table.list',
        [
            'table_list'=>$join_table_status,
            'path'=>$path,
        ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'table_code' => 'required|max:5|alpha_num|unique:table,idTable',
            'table_token' => 'required|max:60|alpha_num|unique:table,token',
        ]);

        if ( $validator->fails() ):
            return redirect()->route('ds-table-create')
                        ->withErrors($validator)
                        ->withInput();

        else:
            
            if( $request->hasFile('qrcode') )
                $img = str_random(60);
            else $img = "";

            $table = Table::create(
                [
                    'codeTable' =>$request->table_code,
                    'status_codeStatus'=>7,
                    'token' =>$request->table_token,
                    'img'=>$img,
                    'description'=>$request->description,
                ]);

            if($table){                
                
                $path = SystemPath::select('path')->where('code','0003')->get()[0]['path'];

                if( $request->hasFile('qrcode') ){            
                    Image::make($request->qrcode->path(),array(
                        'width' => 300,
                        'height' => 300,
                    ))->save($path.($img).".jpg");
                }

                return redirect()->route('ds-table-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',6)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-table-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',7)->get()[0]['alert']);
            }

        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Table::where('idTable',$id)->get()[0];
        $path = SystemPath::select('path')->where('code','0003')->get()[0]['path']; 
        return view('backend.table.edit',
            [
                'table_list'=>$table,
                'path'=>$path,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'table_code' => 'required|max:5|alpha_num',
            'table_token' => 'required|max:60|alpha_num',
        ]);

        if ( $validator->fails() ):
            return redirect()->route('ds-table-show',$request->table_id)
                        ->withErrors($validator)
                        ->withInput();

        else:
            
            if( $request->hasFile('qrcode') )
                $img = str_random(60);
            else $img = Table::select('img')->where('idTable',$request->table_id)->get()[0]['img'];

            $table = Table::where('idTable',$request->table_id)->update(
                [
                    'codeTable'=>$request->table_code,
                    'token' =>$request->table_token,
                    'img'=>$img,
                    'description'=>$request->table_description,
                ]);

            if( $table ){     

                $path = SystemPath::select('path')->where('code','=','0003')->get()[0]['path'];

                if( $request->hasFile('qrcode') ){
                   Image::make($request->qrcode->path(),array(
                        'width' => 300,
                        'height' => 300,
                    ))->save($path.$img.".jpg");
                }         
                                
                return redirect()->route('ds-table-show',$request->table_id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',30)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-table-show',$request->table_id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',31)->get()[0]['alert']);
            }

        endif;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Table::where('idTable',$id)->delete() ):

            return redirect()->route('ds-table-list')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',12)->get()[0]['alert']);
        else:

            return redirect()->route('ds-table-list')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',13)->get()[0]['alert']);

        endif;
    }


}
