<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    const CREATED_AT = 'published_at';
    const UPDATED_AT = null;
    protected $fillable =[
      'title',
      'slug',
      'short_description',
      'content',
      'picture'
    ];

    public function user(){
        # code
        return $this->belongsTo('App\Models\User');
    }

    public function getPictureAttribute($value){
        # code
        if (strpos($value, 'http://') !== FALSE || strpos($value, 'https://') !== FALSE){
            return $value;
        }else {
            return asset('storage/' . $value);
        }
    }
}
