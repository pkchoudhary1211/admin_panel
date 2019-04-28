<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authtclient extends Model
{
    protected $fillable=['user_id','name','secret','redirect','personal_access_client','password_client'];
    protected $table="oauth_clients";
}
