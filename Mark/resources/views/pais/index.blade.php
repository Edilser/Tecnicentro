@extends('layouts/contentLayoutMaster')

@section('title', 'País')

@section('vendor-style')
<!-- vendor css files -->

@endsection
@section('page-style')
<!-- Page css files -->

@endsection

@section('content')

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   
                </div>
                
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="container">
                          <div class="row">
                            <div class="col">
                             
                              {!! Form::open(['route' => 'pais.search', 'method' => 'get', 'novalidate', 'class' => 'form-inline']) !!} 
                             
                              <div class="d-flex align-items-center justify-content-between" style="width: 80%;">
                                  <div class="d-flex justify-content-start">
                                    <p style="margin-right: 5px; margin-top: 5px;" class="form-inline" for="search"><strong>Busqueda</strong></p>
                                    <input type="text" class="form-control" name = "search" style="margin-right: 5px">
                                    <button type="submit" class="btn btn-outline-warning">Buscar</button>
                                  </div>
                                  <div>
                                    <a href="{{ route('pais.index') }}" class="btn btn-outline-primary"><i class="feather icon-align-justify"></i>   Mostrar Todos</a>
                                    <a href="{{ route('pais.create') }}" class="btn btn-outline-success"><i class="feather icon-plus"></i>   Agregar</a>
                                    <a href="{{ route('pais.download') }}" class="btn btn-outline-info"><i class="feather icon-file-text"></i>    Exportar</a>
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
                                    <tr>
                                        <th>País</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($pais as $p)
                                    <tr>
                                      <td>{{ $p->pais}} </td>
                                      <td class="">
                                        <span class="action-edit"><a href="{{ route('pais.edit', $p->id)}}"><i class="feather icon-edit"></i></a></span>
                                        <span class="action-delete"><a href="{{ route('pais.delete', $p->id)}}"><i class="feather icon-trash"></i></a></span>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            {{ $pais->render() }}
                        </div>

                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection

@section('vendor-script')
<!-- vendor files -->
     
     
@endsection
@section('page-script')
<!-- Page js files -->

@endsection
