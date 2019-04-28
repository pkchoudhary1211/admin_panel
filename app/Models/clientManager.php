<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clientManager extends Model
{
    protected $fillable=['user_id','manager_id'];
    protected $table="client_manager";
}
