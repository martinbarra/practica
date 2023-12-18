@extends('layouts.app')

@section('template_title')
    {{ $musica->name ?? "{{ __('Show') Musica" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Musica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('musicas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $musica->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Album:</strong>
                            {{ $musica->album }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $musica->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Duracion:</strong>
                            {{ $musica->duracion }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $musica->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
