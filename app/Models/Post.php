<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    /**
     * Get the user for the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * get the post category
     */
    
    public function postCategory(){
        return $this->belongsTo(PostCategory::class);
    }
    
    public function getPostCategory(){
       return $this->postCategory->name;
    }
}
