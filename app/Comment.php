<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    // public function posts()
    // {
    // 	return $this->belongsTo(Post::class, 'id'); // Here id is the foreign key, that means the primary key of posts table
    // }

    // The code above and the code bellow works same
    public function post()
    {
    	return $this->belongsTo(Post::class); // This Post::class is similar to App\Post
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
