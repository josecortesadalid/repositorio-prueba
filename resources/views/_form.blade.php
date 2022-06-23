@csrf
<label>
    Titulo <br>
    <input type="text" name="nombre" value="{{ old('nombre', $project->nombre) }}">
</label>
<br>
<label>
    Descripcion <br>
    <input type="text" name="descripcion" value="{{ old('descripcion', $project->descripcion) }}">
</label>
<br>
<label>
    URL <br>
    <input type="text" name="titular_url" value="{{ old('titular_url', $project->titular_url) }}">
</label>
<br>
<label>
    Tecnología <br>
    <input type="text" name="tecnologias" value="{{ old('tecnologias', $project->tecnologias) }}">
</label>
<br>