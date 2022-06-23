<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
</head>
<body>
<a href="{{ route('projects.index') }}"> Ir a proyectos </a>

    <h2> Crea un registro de un proyecto </h2>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <label>
            Titulo <br>
            <input type="text" name=" old('nombre') ">
        </label>
        <br>
        <label>
            Descripcion <br>
            <input type="text" name=" old('descripcion') ">
        </label>
        <br>
        <label>
            URL <br>
            <input type="text" name=" old('titular_url') ">
        </label>
        <br>
        <label>
            Tecnología <br>
            <input type="text" name=" old('tecnologias') ">
        </label>
        <br>
    <button> Guardar </button>
    </form>
</body>
</html>