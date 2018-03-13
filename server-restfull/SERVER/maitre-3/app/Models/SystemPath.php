<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemPath extends Model
{
     protected $table= 'system_path';
     protected $fillable = [
        'code','path','description'
    ];
}
