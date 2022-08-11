@include('cms.comuncms')


<div class="container mb-5">

<div class="mx-auto my-5" style="width: 200px;">
    <h1>@lang('Portada')</h1>
    <a href="{{ route('cms.create') }}"  class="btn btn-primary text-center"> Crear articulo </a>
    <a href="{{ route('cms.enviar_email') }}"  class="btn btn-primary text-center mt-3"> Enviar un email </a>
</div>


<div class="card text-center">
  <div class="card-body">

    <h5 class="card-title">{{$articulo1->titular}}</h5>
    <p class="card-text">{{$articulo1->entradilla}}</p>

    @if ($articulo1->user_id)
    <!-- <p class="card-text">Autor: {{$articulo1->user->name}}</p> -->
    <p class="card-text">Autor: {{$articulo1->present()->userName()}}</p>
    @endif

    <!-- Mostramos el texto de ayuda que corresponde a este artículo -->
    <div class="alert alert-warning mx-5" role="alert">
    {{$articulo1->ayuda->body}}
    </div>

    <!-- Mostramos el texto de alerta que corresponde a este artículo -->
    <div class="alert alert-danger mx-5" role="alert">
    {{$articulo1->alerts->pluck('name')->implode(', ')}}
    </div>

    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>

</div>

@foreach ($portadas as $portada)
  <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">{{$portada->nombre_portada}}</h5>
  </div>
</div>
@endforeach


<div class="card text-center">
{!! $portadas->links('pagination::bootstrap-4') !!}
</div>


</body>
</html>