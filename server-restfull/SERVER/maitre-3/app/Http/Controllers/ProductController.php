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
use Image;

class ProductController extends Controller
{
    protected $cate_list;
    protected $prod_list;

    public function __construct()
    {
        $this->cate_list = DB::table('category')->get();
        $this->prod_list = DB::table('product')->get();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.prod.create',
            [
                'cate_list'=>$this->cate_list,
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
            'product_category' => 'required',
            'product_code' => 'required|alpha_num|max:5|unique:product,idProduct',
            'product_stock'=>'required|numeric',
            'product_name' => 'required|min:5|unique:product,nameProduct',
        ]);

        if ( $validator->fails() ):
            return redirect()->route('ds-prod-create')
                        ->withErrors($validator)
                        ->withInput();

        else:
            
            $category = Category::select('idCategory')->where('nameCategory',$request->product_category)->get();
            
            if( $request->hasFile('img') )
                $img = str_random(60);
            else $img = "";
            
            $product = Product::create([
                'category_idCategory'=>$category[0]['idCategory'],
                'code'=>$request->product_code,
                'stock'=>$request->product_stock,
                'nameProduct'=>$request->product_name,
                'description'=>$request->product_descryption,
                'img'=>$img,
                ]);


            if($product){                

                $path = SystemPath::select('path')->where('code','=','0001')->get()[0]['path'];
                if( $request->hasFile('img') ){            
                    Image::make($request->img->path(),array(
                        'width' => 300,
                        'height' => 300,
                    ))->save($path.$img.".jpg");
                }

                return redirect()->route('ds-prod-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',28)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-prod-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',29)->get()[0]['alert']);
            }


        endif;
    }


    public function prodList()
    {
        $path_img = SystemPath::select('path')->where('code',1)->get()[0]['path'];
        return view('backend.prod.list',
            [
                'path_img'=>$path_img,
                'prod_list'=>$this->prod_list,
                'cate_list'=>$this->cate_list,
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
        $prod = Product::where('idProduct','=',$id)->get()[0];
        $path_img = SystemPath::select('path')->where('code',1)->get()[0]['path'];
        return view('backend.prod.edit',
            [
                'prod'=>$prod,
                'cate_list'=>$this->cate_list,
                'path_img'=>$path_img,
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
            'product_category' => 'required',
            'product_code' => 'required|alpha_num|max:5',
            'product_stock'=>'required|numeric',
            'product_name' => 'required|min:5',
        ]);

        if ( $validator->fails() ):
            return redirect()->route('ds-prod-show',$request->product_id)
                        ->withErrors($validator)
                        ->withInput();

        else:

            $category = Category::select('idCategory')->where('nameCategory',$request->product_category)->get();
            
            if( $request->hasFile('img') )
                $img = str_random(60);
            else $img = Product::select('img')->where('idProduct','=',$request->product_id)->get()[0]['img'];
            
            $product = Product::where('idProduct',$request->product_id)
            ->update([
                'category_idCategory'=>$category[0]['idCategory'],
                'code'=>$request->product_code,
                'stock'=>$request->product_stock,
                'nameProduct'=>$request->product_name,
                'description'=>$request->product_descryption,
                'img'=>$img,
                ]);


            if($product){                

                $path = SystemPath::select('path')->where('code','=','0001')->get()[0]['path'];
                if( $request->hasFile('img') ){     
                    //DELETANDO IMAGEM ATUAL    
                    Image::make($request->img->path(),array(
                        'width' => 300,
                        'height' => 300,
                    ))->save($path.$img.".jpg");
                }

                return redirect()->route('ds-prod-show',$request->product_id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',8)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-prod-show',$request->product_id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',9)->get()[0]['alert']);
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
       if( Product::where('idProduct',$id)->delete() ):

            return redirect()->route('ds-prod-list')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',12)->get()[0]['alert']);
        else:

            return redirect()->route('ds-prod-list')
                        ->with('flash_msg',SystemMessage::select('alert')->where('code',13)->get()[0]['alert']);

        endif;
    }
}
