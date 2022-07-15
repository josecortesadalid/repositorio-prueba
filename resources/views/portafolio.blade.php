
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
        @can('create', $newProject)
        <a href="{{ route('projects.create') }}"  class="btn btn-primary text-center "> Crear proyecto </a>
        @endcan
    </div>


        <ul class="m-0 p-0">
            @forelse($portfolio as $portfolioItem)

            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">{{ $portfolioItem->nombre }}</h5>
                    <p class="card-text">{{ $portfolioItem->descripcion }}</p>
                    @if($portfolioItem->imagen)
                    <img src="/storage/{{ $portfolioItem->imagen }}" alt="{{ $portfolioItem->nombre }}" style="height:200px; object-fit: cover">
                    @endif
                    <a href="{{ route('projects.show', $portfolioItem->titular_url) }}" class="btn btn-primary"> Ver proyecto </a>
                    @if ($portfolioItem->category)
                    <a href="#" class="btn btn-secondary"> {{ $portfolioItem->category->name }} </a>                        
                    @endif
                </div>
            </div>

                <!-- <li>{{ $portfolioItem->nombre }}</li>
                <li> <a href="{{ route('projects.show', $portfolioItem->titular_url) }}"> Ver proyecto </a></li> -->
                <br>
                @empty
                <li>No hay proyectos</li>
            @endforelse
        </ul>
<br><br><br>

@can('view-deleted-projects')
    <h2> Proyectos que se han eliminado </h2>
        <ul>
            @foreach ($deletedProjects as $deletedProject)
                <li> {{ $deletedProject->nombre }} 

                @can('restore', $deletedProject)
                <form method="POST" action="{{ route('projects.restore', $deletedProject) }}">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-info">Restaurar</button>
                </form>
                @endcan
                @can('forceDelete', $deletedProject)
                <form method="POST" action="{{ route('projects.restore', $deletedProject) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar permanentemente</button>    
                </form>                
                @endcan

                </li>
            @endforeach
        </ul>
@endcan


    </div>

</body>
</html>

