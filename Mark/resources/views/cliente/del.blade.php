@extends('layouts/contentLayoutMaster')

@section('title', 'Eliminar Clientes')


@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Borrar Cliente</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {{ Form::model($v, ['method' => 'DELETE', 'action' => ['ClienteController@destroy', $id], 'class' => 'form']) }}
                            <div class="form-body">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input disabled type="number" id="dpi" class="form-control"
                                                class="form-control @error('dpi') is-invalid @enderror" placeholder="DPI"
                                                name="dpi" value="{{ $v['dpi'] }}">
                                            <label for="first-name-column">DPI</label>
                                            @error('dpi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input disabled placeholder="Primer Nombre" id="PrimerNombre" type="text"
                                                class="form-control @error('PrimerNombre') is-invalid @enderror"
                                                name="PrimerNombre" value="{{ $v['primerNombre'] }}">
                                            <label for="last-name-column">Primer Nombre</label>

                                            @error('PrimerNombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input disabled id="SegundoNombre" placeholder="Segundo Nombre" type="text"
                                                class="form-control @error('SegundoNombre') is-invalid @enderror"
                                                name="SegundoNombre" value="{{ $v['segundoNombre'] }}">
                                            <label for="city-column">Segundo Nombre</label>

                                            @error('SegundoNombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input disabled id="TercerNombre" placeholder="Tecer Nombre" type="text"
                                                class="form-control @error('TercerNombre') is-invalid @enderror"
                                                name="TercerNombre" value="{{ $v['tercerNombre'] }}">

                                            <label for="country-floating">Tercer Nombre</label>
                                            @error('TercerNombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input disabled id="PrimerApellido" placeholder="Primer Apellido" type="text"
                                                class="form-control @error('PrimerApellido') is-invalid @enderror"
                                                name="PrimerApellido" value="{{ $v['primerApellido'] }}">

                                            <label for="company-column">Primer Apellido</label>
                                            @error('PrimerApellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input disabled id="SegundoApellido" placeholder="Segundo Apellido" type="text"
                                                class="form-control @error('SegundoApellido') is-invalid @enderror"
                                                name="SegundoApellido" value="{{ $v['segundoApellido'] }}">

                                            <label for="email-id-column">Segundo Apellido</label>
                                            @error('SegundoApellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input disabled id="ApellidoCasado" placeholder="Apellido de Casado" type="text"
                                                class="form-control @error('ApellidoCasado') is-invalid @enderror"
                                                name="ApellidoCasado" value="{{ $v['apellidoCasado'] }}">

                                            <label for="email-id-column">Apellido de Casado</label>
                                            @error('ApellidoCasado')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input disabled name="fecha" id="fecha" type="date"
                                                class="form-control @error('fecha') is-invalid @enderror"
                                                value="{{ $v['fechaNacimiento'] }}">
                                            <label for="email-id-column">Fecha Nacimiento</label>
                                            @error('fecha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <div class="table-responsive">
                                                <table name="tel" id="tel"
                                                    class="table table-hover-animation table-striped">
                                                    <thead>
                                                        <tr class="">
                                                            <th scope="col">Telefonos</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($v->telefono as $t)
                                                            <tr id="{{ $t->telefono }}">
                                                                <td>{{ $t->telefono }}</td>
                                                                <td><a ><i ></i></a></span></td>
                                                                <td>
                                                                    <input name="tels[]" value="{{ $t->telefono }}"
                                                                        type="text" hidden>
                                                                </td>
                                                            </tr>



                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8 offset-md-4">
                                        <a href="{{ URL::previous() }}"
                                            class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Eliminar</button>
                                    </div>

                                    <meta name="csrf-token" content="{{ csrf_token() }}">


                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
