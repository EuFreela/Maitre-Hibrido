<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
	protected $table= 'command';


    protected $fillable = [
        'idCommand','codeCommand','menu_codeMenu','amount','table_token','status',
    ]; 
}
