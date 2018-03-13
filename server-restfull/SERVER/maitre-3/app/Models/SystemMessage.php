<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemMessage extends Model
{
     protected $table= 'system_message';
      protected $fillable = [
        'code','type','alert'
    ];
}
