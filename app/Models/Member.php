<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;use SoftDeletes;
    protected $fillable = [
        'room_id',
        'user_id',
        'user_type',
       
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

}
