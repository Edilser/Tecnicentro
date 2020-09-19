@extends('layouts/contentLayoutMaster')

@section('title', 'Cotizaciones')

@section('vendor-style')
        {{-- vendor css files --}}

@endsection

@section('content')
  <!-- Zero configuration table -->
  <section id="basic-datatable">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <!--<h4 class="card-title">Zero configuration</h4>-->
                  </div>
                  <div class="card-content">
                      <div class="card-body card-dashboard">
                          <div class="container">
                            <div class="row">
                              <div class="col">
                                {!! Form::open(['route' => 'cotigssmoto.search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                                @csrf
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <div class="d-flex align-items-center" style="width: 80%;">
                                    <div class="d-flex justify-content-start">
                                      <p style="margin-right: 5px; margin-top: 5px;" class="form-inline" for="search"><strong>Busqueda</strong></p>
                                      <input type="text" class="form-control" name = "search" style="margin-right: 5px">
                                      <button type="submit" class="btn btn-outline-warning">Buscar</button>
                                    </div>
                                    <div class="pl-2">
                                      <a href="{{ route('cotizacion-moto.index') }}" class="btn btn-outline-primary"><i class="feather icon-align-justify"></i>   Mostrar Todos</a>
                                      <a href="{{ route('cotizacion-moto.create') }}" class="btn btn-outline-success"><i class="feather icon-plus"></i>   Agregar</a>
                                    </div>
                                  </div>
                                  <!--!! Form::select('category_id', [ 1 => 'Testing', 2 => 'Edilser' ], null, ['class' => 'form-control ml-20']) !!}
                                  !! Form::select('idproducto', 'edilser') !!}-->

                                {!! Form::close() !!}
                              </div>
                            </div>
                            <br>
                            <br>
                          </div>
                          <!--<p class="card-text">DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</p>-->
                          <div class="table-responsive">
                            <table class="table table-hover-animation table-striped">
                                  <thead>
                                      <tr class="">
                                        <th scope="col">Cliente</th>
                                          <th scope="col">Vehículo</th>
                                          <th scope="col">Fecha</th>
                                          <th scope="col">Total</th>
                                          <th colspan="2">Acciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($cotizacion as $indice => $cotizacion)
                                      @if ($cotizacion->tipo == 3)
                                        <tr>
                                          <td>{{$cotizacion->clientevehiculo->clientes->primerNombre . " " . $cotizacion->clientevehiculo->clientes->primerApellido}}</td>
                                          <td>{{$cotizacion->clientevehiculo->vehiculos->placa . " " . $cotizacion->clientevehiculo->vehiculos->marca[0]->marca . " " . $cotizacion->clientevehiculo->vehiculos->modelo[0]->modelo}}</td>
                                          <td>{{ $cotizacion->fecha}} </td>
                                          <td>{{ $cotizacion->total}} </td>
                                          <td class="">
                                            <a href="{{route('cotizacionMoto.down', $cotizacion->id)}}"><i class="feather icon-eye"></i></a></span>
                                          </td>
                                        </tr>
                                      @endif
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
