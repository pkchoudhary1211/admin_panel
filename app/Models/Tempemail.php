<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tempemail extends Model
{
    protected $fillable=['temp_user_id','temp_user_email'];
    protected $table="temp_email";

}
