<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link @if(Request::route()->getName() == 'posts') active @endif" href="{{ route('posts') }}">Home</a>
      @if(!auth()->check())
      <a class="nav-link @if(Request::route()->getName() == 'register') active @endif" href="{{ route('register') }}">Register</a>
      <a class="nav-link ml-auto @if(Request::route()->getName() == 'login') active @endif" href="{{ route('login') }}">Login</a>
      @endif
      @if(auth()->check())
      <a class="nav-link @if(Request::route()->getName() == 'postCreate') active @endif" href="{{ route('postCreate') }}">Create Post</a>
      <div class="dropdown ml-auto">
        <a class="nav-link dropdown-toggle dorpdown" data-toggle="dropdown" href="#">{{ auth()->user()->name }}</a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li class="text-center"><a href="/logout">Logout</a></li>
        </ul>
      </div>
      @endif
    </nav>
  </div>
</div>