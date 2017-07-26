@extends('layouts.master')

@section('content')
	<div class="col-sm-8 blog-main">
		<div class="blog-post">
			<h2 class="blog-post-title">
				{{ $post_id->title}}
			</h2>
			<p class="blog-post-meta">
				{{ $post_id->created_at->toFormattedDateString() }}
			</p>
			<p> {{ $post_id->body }} </p>

			<hr>

			  <div class="comments">
			  	<i>Comments:</i>
			  	<ul class="list-group">
			  		@foreach($post_id->comments as $comment)
			  			<li class="list-group-item"> <b> {{ $comment->user->name }}: </b> &nbsp; {{ $comment->body }} &nbsp; <i>{{ $comment->created_at->diffForHumans() }}</i></li>
			  		@endforeach
			  	</ul>
			  </div>

			  @include('layouts.formValiErrors')

			  @if(auth()->check())

			  <hr>
				<div class="card">
					<div class="card-block">
						<form method="POST" action="/posts/{{$post_id->id}}/comments">
							{{ csrf_field() }}
							<div class="form-group">
								<textarea class="form-control" placeholder="Your comments here.." name="Comment" required></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Add Comment</button>
							</div>
						</form>
					</div>
				</div>

			@endif

		</div>
	</div>
@endsection
