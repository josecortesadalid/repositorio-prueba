<h1>Usuarios</h1>

<ul class="m-0 p-0">
    @foreach($users as $user)

        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text">{{ $user->email }}</p>
                <p class="card-text">{{ $user->role }}</p>
            </div>
        </div>
    @foreach

</ul>