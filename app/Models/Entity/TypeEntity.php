<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class TypeEntity extends Model
{
    protected $table = 'types';

    protected $fillable = [
        'action', 
        'description'
    ];

    protected $guarded = ['type_id', 'created_at', 'updated_at'];
}
