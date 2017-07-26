@extends('layouts.master')

@section('content')

        <div class="col-sm-8 blog-main">

        @foreach($posts as $post)

          @include('posts.post')
          
        @endforeach

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary @if(!$posts->previousPageUrl()) disabled @endif" href="{{ $posts->previousPageUrl() }}">Older</a>
            <a class="btn btn-outline-primary @if(!$posts->nextPageUrl()) disabled @endif" href="{{ $posts->nextPageUrl() }}">Newer</a>
          </nav>

        </div><!-- /.blog-main -->

@endsection
