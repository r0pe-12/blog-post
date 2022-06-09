<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    const CREATED_AT = 'published_at';
    const UPDATED_AT = null;

    public function user(){
        # code
        return $this->belongsTo('App\Models\User');
    }
}
