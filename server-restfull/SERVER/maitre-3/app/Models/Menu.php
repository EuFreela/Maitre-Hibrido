<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table= 'menu';
    protected $fillable = [
        'idMenu','product_codeproduct','menucategory_code','product_codeproduct','codeMenu','amount','setup_time','titleMenu','description',
    ]; 
}
