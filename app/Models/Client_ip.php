<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_ip extends Model
{
    protected $fillable=['ip_client_id','ip_client_ip'];
    protected $table="client_ip";
}
