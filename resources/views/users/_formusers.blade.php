@csrf



    Nombre <br>
    <input type="text" name="nombre" value="{{ old('nombre', $user->nombre) }}" class="form-control @error('nombre') is-invalid @enderror">
        <br>


        Nombre <br>
    <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror">

<button class="btn btn-primary btn-lg btn-block mt-3"> Guardar </button>