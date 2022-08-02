
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <tdnk rel="dns-prefetch" href="//fonts.gstatic.com">
    <tdnk href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <tdnk href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <tdnk rel="stylesheet" href=" {{ mix('css/app.css')  }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>


<div class="container">

<a href="/usuarios/{{ auth()->id() }}/editar"> Mi cuenta </a>

<h2 class="m-5"> Usuarios con sus roles </h2>

    <table class="table m-5">
        <thead>
            <tr>

            <th scope="col">nombre</th>
            <th scope="col">rol</th>

            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>

                <td> {{ $user->name }} </td>
                <td> 
                    @foreach ($user->roles as $role)
                    <p><b> {{ $role->pluck('display_name')->implode(' - ') }} </b></p>
                    @endforeach
                </td>

                <td>        
                    <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-primary"> Editar usuario </a>
                </td>
                <td>
                    <form method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger mt-2">Eliminar</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

</div>





</body>
</html>

