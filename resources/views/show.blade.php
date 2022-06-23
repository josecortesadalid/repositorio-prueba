
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <h3>{{ $proyecto->nombre }}</h3>
        <ul>
            <li>La descripción es: {{ $proyecto->descripcion }}</li>
            <li>La tecnología es: {{ $proyecto->tecnologias }}</li>
            <li><a href="{{ route('projects.edit', $proyecto->titular_url) }}"> Editar proyecto </a></li>
        </ul>


</body>
</html>
