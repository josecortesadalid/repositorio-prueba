@include('partials.comun')

<div class="container">
<a href="{{ route('usuarios.index') }}"> Ir a proyectos </a>

    <h2> Edita un usuario </h2>

    @if (session()->has('info'))
        {{ session('info') }}
    @endif

    @include('partials.validation-errors')

    <form method="POST" action="{{ route('usuarios.update', $user->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @include('users/_formusers', ['btnText' => 'Actualizar'])

    </form>
</div>
</body>
</html>