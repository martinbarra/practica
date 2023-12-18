@extends('layouts.app')

@section('template_title')
    {{ $cancione->name ?? "{{ __('Show') Cancione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cancione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('canciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cancione->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Album:</strong>
                            {{ $cancione->album }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $cancione->fecha }}
                        </div>
                       
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $cancione->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            {{ $cancione->archivo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
