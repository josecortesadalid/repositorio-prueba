@include('cms.comuncms')


<div class="container">

<div class="mx-auto my-5" style="width: 200px;">
    <h1>@lang('Portada')</h1>
    <a href="{{ route('cms.create') }}"  class="btn btn-primary text-center"> Crear articulo </a>
</div>


    <ul class="m-0 p-0">
        @forelse($articulos as $articulo)

        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{ $articulo->titular }}</h5>
                <p class="card-text">{{ $articulo->entradilla }}</p>
                <!-- <a href="{{ route('projects.show', $articulo->titular_url) }}" class="btn btn-primary"> Ver proyecto </a> -->
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