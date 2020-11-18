<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class UserEntity extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'agency', 
        'account', 
        'cpf', 
        'cellPhone', 
        'email', 
        'password',  
        'street', 
        'city', 
        'state', 
        'postal', 
        'gender'
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
