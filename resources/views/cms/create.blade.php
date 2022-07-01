@include('partials.comun')

<div class="container">
    <a href="{{ route('cms.index') }}" class="btn btn-primary mt-5"> Ir a la portada </a>


    @if(session('status'))
            {{ session('status') }}

    @else

        <h1 class="my-5 text-center"> Crea un articulo </h1>

        <!-- @include('partials.validation-errors') -->

        <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form method="POST" action="{{ route('cms.store') }}" class="bg-white shadow rounded p-2 p-md-4" enctype="multipart/form-data">   
            @include('cms\_formarticulos', ['btnText' => 'Guardar'])
            </form>
        </div>
        </div>
    @endif
</div>
</body>
</html>