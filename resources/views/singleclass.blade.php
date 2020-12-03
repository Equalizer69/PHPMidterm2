<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $classname }}</title>
</head>
<body>
    <div>
        <h1>{{ $classname }}</h1>
        @foreach ($students as $item)
        <p>{{ $item }}</p>
        @endforeach
    </div>
</body>
</html>