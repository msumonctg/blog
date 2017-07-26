<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // This will give the old one first
        // $posts = Post::all();

        // To get the lastest one first
        // $posts = Post::latest()->get();

        $posts = Post::latest()
            ->filterMonthYear(request(['month', 'year']))
            // ->get()
            ->paginate(7);

        // This is equivalent to the above code (latest)
        // $posts = Post::orderBy('created_at', 'desc')->get();

        // To get the old one first
        // $posts = Post::oldest()->get();

        // This is equivalent to the above code (oldest)
        // $posts = Post::orderBy('created_at', 'asc')->get();

    	return view('posts.index', compact('posts'));
    }

    public function show(Post $post_id) //this is done with route model binding
    {
        return view('posts.show', compact('post_id'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	// Method 1
    	// $post = new Post;
    	// $post->title = request('title');
    	// $post->body = request('body');
    	// $post->save();
    	// return redirect('/');

    	// Method 2
    	// Post::create([
    	// 	'title' => request('title'),
    	// 	'body' => request('body'),
    	// ]);
		// return redirect('/');

		// Method 3
		// Post::create(request(['title', 'body']));
		// return redirect('/');

		// Method 4 This method is not secured
		// Post::create(request()->all()); // This is bad practise and not secured
		// return redirect('/');

		// Method 5 Do some validation
		$this->validate(request(), [
			'title' => 'required|min:5',
			'body' => 'required|max:50',
		]);
		// Post::create(request(['title', 'body']));
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);
		return redirect('/');
    }
}
