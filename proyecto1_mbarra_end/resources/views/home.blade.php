@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mb-4">
                    <h1 class="display-4">{{ __('InMusic') }}</h1>
                </div>
                
                @auth
                    <div class="card">
                        <div class="card-header text-center">
                            {{ __('Bienvenid@') }} {{ Auth::user()->name }}
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if(Auth::user()->email === 'admin@gmail.com')
                                <p>{{ __('Si quieres acceder al panel de canciones, presiona el botón:   ') }}
                                <a href="{{ url('/canciones') }}" class="btn btn-primary">{{ __('Ir al Panel de Canciones') }}</a></p>
                            @endif
                        </div>
                    </div>
                @endauth
                
                <form action="{{ url('/home') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar canción" name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>

                @if($searchTerm)
                    <p>Has buscado: "{{ $searchTerm }}"</p>
                @endif

                <div class="container-fluid mt-4">
                    <div class="row">
                        @forelse ($cancionesFiltro ?? $canciones as $cancione)
                            <div class="card col-lg-4">
                                <img src="{{ asset('storage/images/' . $cancione->imagen) }}" class="card-img-top" alt="Imagen de la Canción">
                                <div class="card-body pb-5">
                                    <h5 class="card-title text-center">{{ $cancione->nombre }} - {{ $cancione->album }}</h5>
                                    {{ $cancione->likes_count }}

                                    @auth
                                        @if (!$cancione->likes->where('user_id', Auth::user()->id)->first())
                                            <a href="{{ url('liked/'.$cancione->id) }}" title="Like"> <span class="like" onclick="return true">🤍</span></a>
                                        @else
                                            <a href="{{ url('disliked/'.$cancione->id) }}" title="Dislike"> <span class="dislike" onclick="return true">❤️ </span></a>
                                        @endif
                                    @else
                                        <a href="{{ url('/login') }}" title="Ingresa para dar like"  > <span class="like">🤍</span></a>
                                    @endauth

                                    <audio controls style="width: 100%; position: absolute; bottom:0; right: 0;">
                                        <source src="{{ asset('storage/files/' . $cancione->archivo) }}" type="audio/mpeg">
                                    </audio>
                                </div>
                            </div>
                            
                        @empty
                            <p>No se encontraron canciones.</p>
                        @endforelse
                    </div>
                </div>

                @if($cancionesFiltro)
                    {{ $cancionesFiltro->appends(request()->query())->links() }}
                @else
                    {{ $canciones->appends(request()->query())->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection