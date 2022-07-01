@include('cms.comuncms')


<div class="container">

<div class="mx-auto my-5" style="width: 200px;">
    <h1>@lang('Portada')</h1>
    <a href="{{ route('cms.create') }}"  class="btn btn-primary text-center"> Crear articulo </a>
    <a href="{{ route('cms.enviar_email') }}"  class="btn btn-primary text-center mt-3"> Enviar un email </a>
</div>


<div class="card text-center">
  <div class="card-body">
  <img src="/storage/{{ $articulos[0]->imagen }}" alt="{{ $articulos[0]->titular }}"><br><br>
    <h5 class="card-title">{{$articulos[0]->titular}}</h5>
    <p class="card-text">{{$articulos[0]->entradilla}}</p>

    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>

</div>


<div class="row mt-5">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <img src="/storage/{{ $articulos[0]->imagen }}" alt="{{ $articulos[0]->titular }}"><br><br>
        <h5 class="card-title">    {{$articulos[1]->titular}}</h5>
        <p class="card-text">{{$articulos[0]->entradilla}}</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <img src="/storage/{{ $articulos[0]->imagen }}" alt="{{ $articulos[0]->titular }}"><br><br>
        <h5 class="card-title">    {{$articulos[2]->titular}}</h5>
        <p class="card-text">{{$articulos[0]->entradilla}}</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>


<div class="card text-center mt-5">
  <div class="card-body">
        <img src="/storage/{{ $articulos[0]->imagen }}" alt="{{ $articulos[0]->titular }}"><br><br>
    <h5 class="card-title">    {{$articulos[3]->titular}}</h5>
    <p class="card-text">{{$articulos[0]->entradilla}}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

    <!-- <ul class="m-0 p-0">
        @forelse($articulos as $articulo)

        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{ $articulo->titular }}</h5>
                <p class="card-text">{{ $articulo->entradilla }}</p>
            </div>
        </div>


            <br>
            @empty
            <li>No hay proyectos</li>
        @endforelse
    </ul> -->
</div>

</body>
</html>