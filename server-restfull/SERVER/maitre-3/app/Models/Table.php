<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table= 'table';
     protected $fillable = [
        'codeTable','status_codeStatus','ip','token','img','description'
    ];
}
