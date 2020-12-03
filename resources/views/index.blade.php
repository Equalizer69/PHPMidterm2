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
        <h1>klasebi</h1>
        @if (Auth::user()->isAdmin == 1)
            <a href="{{ route('students') }}">Students</a>
            <a href="{{ route('classes') }}">Classes</a>
        @endif
        @if (Auth::user()->isAdmin == 0)
            <a href="{{ route('my_classes') }}">My Classes</a>
        @endif
    </div>
</body>
</html>