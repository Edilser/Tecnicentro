@extends('layouts/contentLayoutMaster')

@section('title', 'Modelos')

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
                                {!! Form::open(['route' => 'modelo.search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                                @csrf
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <div class="d-flex align-items-center justify-content-between" style="width: 80%;">
                                    <div class="d-flex justify-content-start">
                                      <p style="margin-right: 5px; margin-top: 5px;" class="form-inline" for="search"><strong>Busqueda</strong></p>
                                      <input type="text" class="form-control" name = "search" style="margin-right: 5px">
                                      <button type="submit" class="btn btn-outline-warning">Buscar</button>
                                    </div>
                                    <div>
                                      <a href="{{ route('modelo.index') }}" class="btn btn-outline-primary"><i class="feather icon-align-justify"></i>   Mostrar Todos</a>
                                      <a href="{{ route('modelo.create') }}" class="btn btn-outline-success"><i class="feather icon-plus"></i>   Agregar</a>
                                      <a href="{{ route('descargarmodelo') }}"  class="btn btn-outline-info"><i class="feather icon-file-text"></i>    Exportar</a>
                                    </div>
                                  </div>
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
                                          <th scope="col">Modelo</th>
                                          <th colspan="2">Acciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($modelo as $modelo)
                                      <tr>
                                        <td>{{ $modelo->modelo}} </td>
                                        <td class="">
                                          <a href="{{ route('modelo.edit', $modelo->id)}}"><i class="feather icon-edit"></i></a></span>
                                          <a href="{{ route('modelo.delete', $modelo->id)}}"><i class="feather icon-trash"></i></a></span>
                                        </td>
                                      </tr>
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
