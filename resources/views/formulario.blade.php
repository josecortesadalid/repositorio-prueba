<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> GET </h1>
    <form action="formulario" method="GET">
        <input type="text" name="search">
        <input type="submit" value="BUSCAR">
    </form>
    <h1> POST </h1>
    <form action="formulario" method="POST">
        @csrf
        <input type="text" name="search">
        <input type="submit" value="BUSCAR">
    </form>
</body>
</html>