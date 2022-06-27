
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


    <div class="container">

    <div class="mx-auto my-5" style="width: 200px;">
        <h1>@lang('Portfolio')</h1>
        <a href="{{ route('projects.create') }}"  class="btn btn-primary text-center "> Crear proyecto </a>
    </div>


        <ul class="m-0 p-0">
            @forelse($portfolio as $portfolioItem)

            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">{{ $portfolioItem->nombre }}</h5>
                    <p class="card-text">{{ $portfolioItem->descripcion }}</p>
                    <a href="{{ route('projects.show', $portfolioItem->titular_url) }}" class="btn btn-primary"> Ver proyecto </a>
                </div>
            </div>

                <!-- <li>{{ $portfolioItem->nombre }}</li>
                <li> <a href="{{ route('projects.show', $portfolioItem->titular_url) }}"> Ver proyecto </a></li> -->
                <br>
                @empty
                <li>No hay proyectos</li>
            @endforelse
        </ul>
    </div>

</body>
</html>

