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

class CategoryController extends Controller
{

    protected $cate_list;

    public function __construct()
    {
        $this->cate_list = DB::table('category')->get();
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

    public function cateList()
    {
        $path = SystemPath::select('path')->where('code',2)->get()[0]['path'];
        return view('backend.cate.list',
            [
                'cate_list'=>$this->cate_list,
                'path_img'=>$path,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cate.create');
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
            'category_code' => 'required|numeric|unique:category,idCategory',
            'category_name' => 'required|min:5|unique:category,nameCategory',
            'category_description'=>'',
        ]);

        if ( $validator->fails() ):
            return redirect()->route('ds-cate-create')
                        ->withErrors($validator)
                        ->withInput();

        else:
           
            if( $request->hasFile('img') )
                $img = str_random(60);
            else $img = "";
            
            $category = Category::create([
                'codeCategory'=>$request->category_code,
                'nameCategory'=>$request->category_name,
                'description'=>$request->category_description,
                'img'=>$img,
                ]);


            if($category){                

                $path = SystemPath::select('path')->where('code','=','0002')->get()[0]['path'];
                if( $request->hasFile('img') ){            
                    Image::make($request->img->path(),array(
                        'width' => 300,
                        'height' => 300,
                    ))->save($path.$img.".jpg");
                }

                return redirect()->route('ds-cate-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',14)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-cate-create')
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',15)->get()[0]['alert']);
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
        $cate = Category::where('idCategory',$id)->get()[0];
        $path = SystemPath::select('path')->where('code',2)->get()[0]['path'];
        return view('backend.cate.edit',
            [
                'cate'=>$cate,
                'path_img'=>$path,
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
            'category_code' => 'required|numeric',
            'category_name' => 'required|min:5',
            'category_description'=>'',
        ]);

        if ( $validator->fails() ):
            return redirect()->route('ds-cate-show',$request->category_id)
                        ->withErrors($validator)
                        ->withInput();

        else:
           
            if( $request->hasFile('img') )
                $img = str_random(60);
            else $img = Category::select('img')->where('idCategory',$request->category_id)->get()[0]['img'];
            
            $category = Category::where('idCategory',$request->category_id)
            ->update([
                'codeCategory'=>$request->category_code,
                'nameCategory'=>$request->category_name,
                'description'=>$request->category_description,
                'img'=>$img,
                ]);


            if($category){                

                $path = SystemPath::select('path')->where('code','=','0002')->get()[0]['path'];
                if( $request->hasFile('img') ){            
                    Image::make($request->img->path(),array(
                        'width' => 300,
                        'height' => 300,
                    ))->save($path.$img.".jpg");
                }

                return redirect()->route('ds-cate-show',$request->category_id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',16)->get()[0]['alert']);
            }else{

                return redirect()->route('ds-cate-show',$request->category_id)
                        ->with('flash_msg_success',SystemMessage::select('alert')->where('code',17)->get()[0]['alert']);
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
        if( !Product::where('category_idcategory',$id)->get() ){
            if( Category::where('idCategory',$id)->delete() ):

                return redirect()->route('ds-cate-list')
                            ->with('flash_msg_success',SystemMessage::select('alert')->where('code',18)->get()[0]['alert']);
            else:

                return redirect()->route('ds-cate-list')
                            ->with('flash_msg',SystemMessage::select('alert')->where('code',19)->get()[0]['alert']);

            endif;
        }else
             return redirect()->route('ds-cate-list')
                            ->with('flash_msg',SystemMessage::select('alert')->where('code',34)->get()[0]['alert']);

    }
}
