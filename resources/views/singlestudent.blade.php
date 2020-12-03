<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Page</title>
</head>
<body>
    <div>
        <h3>{{ $student->name }}</h3>
        <h3>{{ $student->email }}</h3>
        <br>
        <p><b>Classes</b></p>
        @foreach ($classes as $class)
        <p>{{ $class->classname }} <a href="{{ route('deletefromclass',[$student->id, $class->id]) }}"> Delete </a></p>
        @endforeach

        <br>

        <p><b>Add To Class</b></p>
        <form method="POST" action="{{ route('addtoclass') }}">
            @csrf
            <input type="hidden" name="studentid" value="{{ $student->id }}">
            <select name="classid" id="classid">
                @foreach ($allclasses as $class)
                <option value="{{ $class->id }}">
                            {{ $class->classname }}
                    </option>
                @endforeach
            </select>
            <button type="submit"> Save </button>
        </form>

    <a href="{{ route('home') }}">Return to home</a>
    <br>
    <a href="{{ route('index') }}">Return to index page</a>

    </div>
</body>
</html>