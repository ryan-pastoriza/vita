<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Account extends Authenticatable
{
    use Notifiable;
    use AuthenticableTrait;
    
    protected $table = "accounts";
    protected $primaryKey = "account_id";

    protected $hidden = [
        'password'
    ];
}
