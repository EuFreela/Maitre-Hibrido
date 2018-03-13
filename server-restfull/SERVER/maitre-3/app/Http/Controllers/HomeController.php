<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;


class HomeController extends Controller
{

    protected $menu_list;

    public function __construct()
    {
        $this->menu_list = DB::table('menu')->get();

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = ['email'=>$request->email,'password'=>$request->password];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:50',
            'password' => 'required|max:50',
        ]);

        if ( $validator->fails() ) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }else{

            if ( Auth::attempt($credentials) )
            {
                 return redirect()->route('ds-home')
                        ->with('flash_msg','Olá '.Auth::user()->name.', seja bem vindo.');                

            }else{
                return redirect('/')
                        ->with('flash_msg','Usuário não encontrado');

            }


        }
    }

    public function Home()
    {        
        if( Table::where('ip',$_SERVER['REMOTE_ADDR'])->first() )
            $token = Table::where('ip',$_SERVER['REMOTE_ADDR'])->get()[0]->token;
        else
            $token = '0';
              
        return view('frontend.menu',
            [
                'menu_list' => $this->menu_list,
                'token' => $token,
            ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
