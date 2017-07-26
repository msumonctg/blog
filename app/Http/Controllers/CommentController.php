<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store($id)
    {
    	$this->validate(request(), [
    		'Comment' => 'required|min:1',
    	]);
    	Comment::create([
    		'body' => request('Comment'),
    		'post_id' => $id,
            'user_id' => auth()->id(),
    	]);

    	return back();
    }
}
