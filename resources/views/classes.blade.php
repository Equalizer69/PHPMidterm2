<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classes</title>
</head>
<body>
    <div>
        <h1>Classes</h1>
        <br>
        @foreach ($classes as $class)
        <p>{{ $class->classname }} <a href="{{ route('singleclass',[$class->id]) }}">Students</a> </p>
        @endforeach
    </div>
    <a href="{{ route('index') }}">Return to index page</a>
    <br>
    <a href="{{ route('home') }}">Return to home page</a>
</body>
</html>