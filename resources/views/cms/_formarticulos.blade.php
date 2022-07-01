@csrf

    Titulo <br>
    <input type="text" name="titular" value="{{ old('titular', $articulo->titular) }}" class="form-control @error('titular') is-invalid @enderror">
        
    @error('titular')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<br>

    Entradilla <br>
    <input type="text" name="entradilla" value="{{ old('entradilla', $articulo->entradilla) }}" class="form-control @error('entradilla') is-invalid @enderror">
    @error('entradilla')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<br>

    Cuerpo <br>
    <input type="text" name="cuerpo" value="{{ old('cuerpo', $articulo->cuerpo) }}" class="form-control @error('cuerpo') is-invalid @enderror">
    @error('cuerpo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<br>

    Imagen <br>

    <div class="mb-3">
    <label for="formFile" class="form-label">Imagen</label>
    <input class="form-control" type="file" name="imagen" id="formFile">
    </div>
    @error('imagen')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <!-- <input type="text" name="imagen" value="{{ old('imagen', $articulo->imagen) }}" class="form-control @error('imagen') is-invalid @enderror">
    @error('imagen')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror -->

<br>

    Titular URL <br>
    <input type="text" name="titular_url" value="{{ old('titular_url', $articulo->titular_url) }}" class="form-control @error('titular_url') is-invalid @enderror">
    @error('titular_url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<br>

<button class="btn btn-primary btn-lg"> Guardar </button>

@if(session('status'))
        {{ session('status') }}

@endif