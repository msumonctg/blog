<!DOCTYPE html>
<html>
<head>
	<title>About</title>
</head>
<body>

<h2>About Me</h2>

<p>
Name: <b>{{ $name }}</b> <br>
Age: <b>{{ $age }}</b>
</p>

<p>
Tasks:
<ul>
@foreach($tasks as $task)
	<li>
		{{ $task }}
	</li>	
@endforeach
</ul>
</p>

<p>
Book list:
<ol>
@foreach($books as $book)
	<li>
		{{ $book }}
	</li>
@endforeach
</ol>
</p>

</body>
</html>