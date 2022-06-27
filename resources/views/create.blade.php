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


@if(session('status'))
        {{ session('status') }}

@else

    <h2> Crea un registro de un proyecto </h2>

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('projects.store') }}">
        
    @include('_form', ['btnText' => 'Guardar'])
    </form>
@endif

</body>
</html>