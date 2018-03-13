<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Nivel;
use App\Models\Department;
use App\Models\Status;
use App\Models\Product;
use App\Models\Table;
use App\Models\SystemMessage;
use App\Models\Command;


class UserController extends Controller
{

    protected $user_nivel;
    protected $user_department;
    protected $user_status;
    protected $user_list;


    public function __construct()
    {
        $this->user_nivel = DB::table('nivel')->get();
        $this->user_department = DB::table('department')->get();
        $this->user_status = DB::table('status')->get();
        $this->user_list = DB::table('users')->get();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = count(Product::where('stockProduct','<',20)->get());
        $prod_all = count(Product::get());

        $table = count(Table::where('status_codeStatus',6)->get());
        $table_all = count(Table::get());

        $command_going = count(Command::where('status',4)->get());
        $command_end = count(Command::where('status',5)->get());
        $command = Command::get();

        $chartCommand = DB::table('command')
        ->join('menu','menu.codeMenu','=','command.menu_codeMenu')
        ->select('menu.titleMenu','command.amount')
        ->where('status',5)
        ->get();


        $department = Department::get();
        $nivel = Nivel::get();

        return view('backend.home',
            [   
                'prod_end'=>$prod,
                'prod_all'=>$prod_all,
                'table'=>$table,
                'table_all'=>$table_all,
                'command'=>$command,
                'command_going'=>$command_going,
                'command_end'=>$command_end,
                'chartCommand'=>$chartCommand,

                'department'=>$department,
                'nivel'=>$nivel,

            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create',
            [
                'user_nivel'=>$this->user_nivel,
                'user_department'=>$this->user_department,
                'user_status'=>$this->user_status,
                'user_list'=>$this->user_list,
            ]);
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
            'user_status'=>'required',
            'user_nivel'=>'required',
            'user_department'=>'required',
            'user_name'  => 'required|min:5',
            'user_email' => 'required|email|max:30|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ( $validator->fails() ){
            return redirect()->route('ds-user-create')
                        ->withErrors($validator)
                        ->withInput();
        }else{

            $department = Department::select('idDepartment')->where('nameDepartment',$request->user_department)->get();
            $nivel = Nivel::select('idNivel')->where('nameNivel',$request->user_nivel)->get();
            $status = Status::select('codeStatus')->where('nameStatus',$request->user_status)->get();

            $user = User::create([
                'nivel_idnivel'=>$nivel[0]['idNivel'],
                'status_codeStatus'=>$status[0]['codeStatus'],
                'department_iddepartment'=>$department[0]['idDepartment'],
                'name'=>$request->user_name,
                'email'=>$request->user_email,
                'password'=>bcrypt($request->password),
                'api_token'=>str_random(60),
                ]);


            if($user){

                return redirect()->route('ds-user-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',1)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-user-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',3)->get()[0]['alert']);
            }   

        }
    }


    public function userlist()
    {
        return view('backend.user.list',
            [
                'user_list'=>$this->user_list,
                'user_status'=>$this->user_status,
                'user_nivel'=>$this->user_nivel,
                'user_department'=>$this->user_department,
            ]);
    }

    public function UserlistToken()
    {
        return view('backend.user.list_token',
            [
                'user_list'=>$this->user_list,
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
        $user = User::find($id);
        return view('backend.user.edit',
            [
                'user'=>$user,
                'user_list'=>$this->user_list,
                'user_status'=>$this->user_status,
                'user_nivel'=>$this->user_nivel,
                'user_department'=>$this->user_department
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
            'user_status'=>'required',
            'user_nivel'=>'required',
            'user_department'=>'required',
            'user_name'  => 'required|alpha_num|min:5',
            'user_email' => 'required|email|max:30',
        ]);

        if ( $validator->fails() ):
            return redirect()->route('ds-user-show',$request->id)
                        ->withErrors($validator)
                        ->withInput();
        else:

            $department = Department::select('idDepartment')->where('nameDepartment',$request->user_department)->get();
            $nivel = Nivel::select('idNivel')->where('nameNivel',$request->user_nivel)->get();
            $status = Status::select('idStatus')->where('nameStatus',$request->user_status)->get();

            $user = User::where('id',$request->id)
                    ->update([
                        'nivel_idnivel'=>$nivel[0]['idNivel'],
                        'status_idstatus'=>$status[0]['idStatus'],
                        'department_iddepartment'=>$department[0]['idDepartment'],
                        'name'=>$request->user_name,
                        'email'=>$request->user_email,                        
                        ]);


            if($user):

                return redirect()->route('ds-user-show',$request->id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',2)->get()[0]['alert']);
            else:

                return redirect()->route('ds-user-show',$request->id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',4)->get()[0]['alert']);
            endif;
            

        endif;
    }

    public function passwordEdit($id)
    {
        $user = User::find($id);
        return view('backend.user.password',['user'=>$user]);
    }

    public function password(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ( $validator->fails() ):
            return redirect()->route('ds-user-password-edit',$request->id)
                        ->withErrors($validator)
                        ->withInput();
        else:

            $user = User::where('id',$request->id)->update([                
                'password'=>bcrypt($request->password),
                ]);


            if($user){

                return redirect()->route('ds-user-password-edit',$request->id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',20)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-user-password-edit',$request->id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',21)->get()[0]['alert']);
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
        if( User::destroy($id) ):

            return redirect()->route('ds-user-list')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',10)->get()[0]['alert']);
        else:

            return redirect()->route('ds-user-list')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',11)->get()[0]['alert']);

        endif;
    }
}
