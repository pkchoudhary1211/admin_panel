<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpdatPassword extends Model
{
    protected $fillable=['user_email','token'];

    protected $table="update_user_password";
}
