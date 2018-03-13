<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\SystemPath;
use App\Models\SystemMessage;
use App\Models\Product;
use App\Models\Menu;
use App\Models\MenuCategory;
use Image;

class MenuController extends Controller
{

    protected $cate_list;
    protected $prod_list;
    protected $menu_list;
    protected $menu_menucategory;

    public function __construct()
    {
        $this->cate_list = DB::table('category')->get();
        $this->prod_list = DB::table('product')->get();
        $this->menu_list = DB::table('menu')->get();
        $this->menu_menucategory = DB::table('menu_category')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function menuList()
    {
        $menu_list_unique = DB::table('menu')->get()->unique('codeMenu');
        return view('backend.menu.list',
            [
                'menu_list_unique'=>$menu_list_unique,
                'menu_list'=>$this->menu_list,
                'prod_list'=>$this->prod_list,
                'cate_list'=>$this->cate_list,                
            ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $join_prod_cate = DB::table('category')
             ->join('product', 'product.category_codeCategory', '=', 'category.codeCategory')
             ->select('category.codeCategory','category.nameCategory')
             ->get()->unique();

        return view('backend.menu.create',
            [
                'join_prod_cate'=>$join_prod_cate,
                'menu_menucategory'=>$this->menu_menucategory,
            ]);
    }


    public function searchProduct($id)
    {        
       $query = DB::table('product')
             ->join('category', 'product.category_codeCategory', '=', 'category.codeCategory')
             ->select('product.idProduct','product.nameProduct', 'category.nameCategory')
             ->where('category_codeCategory',$id)
             ->get();

        return response()->Json($query);
             
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
            'menu_title'=>'required|min:5',
            'menu_code'=>'required|max:5',
            'menu_amount'=>'required',
            'menu_items'=>'required',
            'menu_menucategory'=>'required',
        ]);

        if ( $validator->fails() ){
            return redirect()->route('ds-menu-create')
                        ->withErrors($validator)
                        ->withInput();
        }else{

            for($i=0;$i<=count($request->menu_items)-1;$i++)
               $menu = Menu::create([
                        'product_idproduct'=> Product::select('idProduct')->where('nameProduct',$request->menu_items[$i])->get()[0]['idProduct'],
                        'menucategory_idMenuCategory'=>$request->menu_menucategory,
                        'codeMenu'=>$request->menu_code,
                        'amount'=>$request->menu_amount,
                        'setup_time'=>$request->menu_setup_time,
                        'titleMenu'=>$request->menu_title,
                        'description'=>$request->menu_description,
                        ]);
            if($menu){

                return redirect()->route('ds-menu-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',22)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-menu-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',23)->get()[0]['alert']);
            }   

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = DB::table('menu')->where('codeMenu',$id)->get()[0];
        $menu_menuCategory = DB::table('menu_category')->get();
        
        $join_prod_cate = DB::table('category')
             ->join('product', 'product.category_codeCategory', '=', 'category.codeCategory')
             ->select('category.codeCategory','category.nameCategory')
             ->get()->unique();
        
        $join_items_menu = DB::table('menu')
             ->join('product', 'product.codeProduct', '=', 'menu.product_codeproduct')
             ->select('menu.codeMenu','product.nameProduct')
             ->where('menu.codeMenu',$id)
             ->get();

        return view('backend.menu.edit',
            [
                'menu'=>$menu,
                'menu_menuCategory'=>$menu_menuCategory,
                'join_prod_cate'=>$join_prod_cate,
                'join_items_menu'=>$join_items_menu,
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
            'menu_title'=>'required|min:5',
            'menu_code'=>'required|max:5',
            'menu_amount'=>'required',
            'menu_items'=>'required',            
            'menu_menucategory'=>'required',
        ]);

        if ( $validator->fails() ){
            return redirect()->route('ds-menu-show',$request->code)
                        ->withErrors($validator)
                        ->withInput();
        }else{

            Menu::where('codeMenu',$request->code)->delete();
            for($i=0;$i<=count($request->menu_items)-1;$i++)
               $menu = Menu::create([
                        'product_idproduct'=> Product::select('idProduct')->where('nameProduct',$request->menu_items[$i])->get()[0]['idProduct'],
                        'codeMenu'=>$request->menu_code,
                        'menucategory_idMenuCategory'=>$request->menu_menucategory,
                        'amount'=>$request->menu_amount,
                        'setup_time'=>$request->menu_setup_time,
                        'titleMenu'=>$request->menu_title,
                        'description'=>$request->menu_description,
                        ]);
            if($menu){

                return redirect()->route('ds-menu-show',$request->code)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',24)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-menu-show',$request->code)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',25)->get()[0]['alert']);
            }   


        }
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
        if( Menu::where('codeMenu',$id)->delete() ):

            return redirect()->route('ds-menu-list')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',26)->get()[0]['alert']);
        else:

            return redirect()->route('ds-menu-list')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',27)->get()[0]['alert']);

        endif;
    }


}
