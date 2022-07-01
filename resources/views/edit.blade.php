@include('partials.comun')

<div class="container">
<a href="{{ route('projects.index') }}"> Ir a proyectos </a>

    <h2> Edita un registro de un proyecto </h2>

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('projects.update', compact('project')) }}" enctype="multipart/form-data">
        @method('PATCH')
        @include('_form', ['btnText' => 'Actualizar'])

    </form>
</div>
</body>
</html>