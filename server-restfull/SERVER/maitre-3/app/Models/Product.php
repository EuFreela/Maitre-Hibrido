<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table= 'product';
    protected $fillable = [
        'idProduct','category_codeCategory','codeProduct','stockProduct','nameProduct','description','img',
    ];   

}
