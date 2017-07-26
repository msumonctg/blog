<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
@foreach($tasks as $task)
<a href="/tasks/{{ $task->id}}">{{ $task->body }}</a>
<br>
@endforeach
</body>
</html>