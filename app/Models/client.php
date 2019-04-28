<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable=['id','user_id','client_id','name','secret','redirect','personal_access_client','password_client'];
    protected $table="oauth_clients";
}
