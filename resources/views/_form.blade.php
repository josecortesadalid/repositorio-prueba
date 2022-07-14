@csrf

@if($project->imagen)
                    <img src="/storage/{{ $project->imagen }}" alt="{{ $project->nombre }}" class="mb-4" style="height:150px; object-fit: cover">
                    @endif

    <div class="mb-3">
    <label for="formFile" class="form-label">Imagen</label>
    <input class="form-control" type="file" name="imagen" id="formFile">
    </div>

    <div class="form-group">
        <label for="category_id">Categoria de proyecto</label>
        <select 
        name="category_id" 
        id="category_id"
        class="form-control "
        >
    
        <option value="">Seleccione</option>
        @foreach ($categories as $id => $name )
            <option value="{{ $id }}" 
            @if ($id == old('category_id', $project->category_id)) 
                selected
            @endif
            > {{ $name }} </option> 
            <!-- Ponemos solo 2 iguales porque 3 comprobarían el tipo de dato y nos daría error -->
        @endforeach
        </select>
    </div>

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