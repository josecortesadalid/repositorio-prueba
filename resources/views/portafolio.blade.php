
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link rel="stylesheet" href=" {{ mix('css/app.css')  }}">
    
</head>
<body>

<h1>@lang('Portfolio')</h1>

<a href="{{ route('projects.create') }}"> Crear proyecto </a>

<ul>
    @forelse($portfolio as $portfolioItem)

        <li>{{ $portfolioItem->nombre }}</li>
        <li> <a href="{{ route('projects.show', $portfolioItem->titular_url) }}"> Ver proyecto </a></li>
        <br>
        @empty
        <li>No hay proyectos</li>

    @endforelse
    
</ul>



</body>
</html>

