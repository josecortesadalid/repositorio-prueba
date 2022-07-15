@include('partials.comun')

<div class="container">


<a href="{{ route('projects.index') }}" class="btn btn-primary m-5"> Ir a proyectos </a>

    <div class="card m-5 " >
        <div class="card-body">
            <h5 class="card-title">{{ $proyecto->nombre }}</h5>
            <p class="card-text">La descripción es: {{ $proyecto->descripcion }}</p>
            <p class="card-text">La tecnología es: {{ $proyecto->tecnologias }}</p>
            <a href="{{ route('projects.edit', $proyecto->titular_url) }}" class="btn btn-primary"> Editar proyecto </a>

    @can('delete', $proyecto)
    <form method="POST" action="{{ route('projects.destroy', $proyecto) }}">
    @csrf @method('DELETE')
    <button class="btn btn-danger mt-2">Eliminar</button>
    </form>
    @endcan
    </div>
    </div>

</div>

</body>
</html>
