@extends('layouts.app')

@section('template_title')
    Cancione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cancione') }}
                            </span>

                             
                        </div>
                    </div>
                   

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Album</th>
										<th>Fecha</th>
										<th>Duracion</th>
										<th>Imagen</th>
										<th>Archivo</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($canciones as $cancione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cancione->nombre }}</td>
											<td>{{ $cancione->album }}</td>
											<td>{{ $cancione->fecha }}</td>
											<td>{{ $cancione->duracion }}</td>
                                         <td>  <img src="{{ asset('storage/images/' . $cancione->imagen) }}" alt="Imagen de la Canción" width="50" height="50"></td>
											<td><audio controls>
                                                <source src="{{ asset('storage/files/' . $cancione->archivo) }}" type="audio/mpeg">
                                               
                                            </audio></td>

                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $canciones->links() !!}
            </div>
        </div>
    </div>
@endsection
