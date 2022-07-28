


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    @auth
                    {{ auth()->user()->name }} 
                    @endauth
                </div>
                <div class="card-body">
                @guest             
                        <a href="{{ route('login') }}">Enlace al login</a>
                        @endguest
            
                </div>

 @if (auth()->check())
    <a href="/a/logout"> Cerrar sesión
    </a>  
 @endif      
 
 
 @if(auth()->check())
Usuario autenticado
@endif


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    

            </div>
        </div>
    </div>
</div>

