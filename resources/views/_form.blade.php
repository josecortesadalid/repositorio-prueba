@csrf

    Titulo <br>
    <input type="text" name="nombre" value="{{ old('nombre', $project->nombre) }}" class="form-control @error('nombre') is-invalid @enderror">
        
    @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<br>

    Descripcion <br>
    <input type="text" name="descripcion" value="{{ old('descripcion', $project->descripcion) }}" class="form-control @error('descripcion') is-invalid @enderror">
    @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<br>

    URL <br>
    <input type="text" name="titular_url" value="{{ old('titular_url', $project->titular_url) }}" class="form-control @error('titular_url') is-invalid @enderror">
    @error('titular_url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<br>

    Tecnología <br>
    <input type="text" name="tecnologias" value="{{ old('tecnologias', $project->tecnologias) }}" class="form-control @error('tecnologias') is-invalid @enderror">
    @error('tecnologias')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<br>

<button class="btn btn-primary btn-lg btn-block mt-3"> Guardar </button>