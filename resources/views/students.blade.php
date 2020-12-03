<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
</head>
<body>
    <div>
        <h1>Students</h1>
        <table>
            <tr>
                <th> Name </th>
            </tr>
            @foreach ($users as $item)
            <tr>
                <td> {{ $item->name }} </td>
                <td> 
                    <a class="button" href="{{ route('singlestudent',[$item->id]) }}">Details</a>    
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>