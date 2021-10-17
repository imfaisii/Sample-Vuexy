<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAttributes extends Model
{
    use HasFactory; use SoftDeletes;
    protected $fillable=[
        'user_id',
        'image',
        'user_type',
        'is_available',
        'status',
        'val_id',
    ];
}
