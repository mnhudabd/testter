<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3> bỉbord</h3>
<ul>
    @foreach($projects as $projects)
        <li>{{$projects->title}}</li>
    @endforeach
</ul>
</body>
</html>