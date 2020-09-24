@extends('layouts/contentLayoutMaster')

@section('title', 'Editar Clientes')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection
@section('page-style')
<!-- Page css files -->
<link rel="stylesheet" type="text/css" href={{ asset(mix('/css/plugins/forms/validation/form-validation.css')) }}>
@endsection

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Editar Cliente</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {{ Form::model($v, ['method' => 'PATCH', 'action' => ['ClienteController@update', $id], 'class' => 'form']) }}


                        <div class="form-body">
                            <div class="row">
                                @csrf
                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <label for="first-name-column">DPI</label>
                                        <input placeholder="DPI" id="dpi" type="text" class="form-control @error('dpi') is-invalid @enderror" name="dpi" value="{{ $v['dpi'] }}" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[0-9]{13,13}$" data-validation-regex-message=' {{ __('validation.DPIMessage') }} '>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                    <label for="last-name-column">Primer Nombre</label>
                                        <input placeholder="Primer Nombre" id="PrimerNombre" type="text" class="form-control" name="PrimerNombre" value="{{ $v['primerNombre'] }}" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <label for="city-column">Segundo Nombre</label>
                                        <input id="SegundoNombre" placeholder="Segundo Nombre" type="text" class="form-control" name="SegundoNombre" value="{{ $v['segundoNombre'] }}" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <label for="country-floating">Tercer Nombre</label>
                                        <input id="TercerNombre" placeholder="Tecer Nombre" type="text" class="form-control" name="TercerNombre" value="{{ $v['tercerNombre'] }}" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <label for="company-column">Primer Apellido</label>
                                        <input id="PrimerApellido" placeholder="Primer Apellido" type="text" class="form-control" name="PrimerApellido" value="{{ $v['primerApellido'] }}" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <label for="email-id-column">Segundo Apellido</label>
                                        <input id="SegundoApellido" placeholder="Segundo Apellido" type="text" class="form-control" name="SegundoApellido" value="{{ $v['segundoApellido'] }}" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <label for="email-id-column">Apellido de Casado</label>
                                        <input id="ApellidoCasado" placeholder="Apellido de Casado" type="text" class="form-control" name="ApellidoCasado" value="{{ $v['apellidoCasado'] }}" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <label for="email-id-column">Fecha Nacimiento</label>
                                        <input name="fecha" id="fecha" type="date" class="form-control" value="{{ $v['fechaNacimiento'] }}" required data-validation-required-message='{{ __('validation.required') }}'>
                                        <p class="help-block"></p>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 col-12">

                                                    <input id="telefono" placeholder="Telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" data-validation-regex-regex="^[0-9]{8,8}$" data-validation-regex-message=' {{ __('validation.TelefonoMessage') }} '>
                                                    <p class="help-block"></p>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <a onclick="Insert()" class="btn btn-outline-success"><i class="feather icon-plus"></i> Agregar</a>
                                                    </td>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group validate">
                                        <div class="table-responsive">
                                            <table name="tel" id="tel" class="table table-hover-animation table-striped">
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
                                                        <td><a onclick="Remove('{{ $t->telefono }}');"><i class="feather icon-trash"></i></a></span></td>
                                                        <td>
                                                            <input name="tels[]" value="{{$t->telefono}}" type="text" hidden>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <!-- inicia direccion -->
                                <div class="col-md-6 col-12">
                                            <div class="form-group validate">
                                                <div class="col-md-5">
                                                    <span>Calle o Avenida</span>
                                                </div>

                                                <input id="calleave" placeholder="Calle o Avenida" type="text"
                                                class="form-control"
                                                name="calleave" value="{{ $v->direccion[0]->calleave }}" required
                                                data-validation-required-message='{{ __('validation.required') }}'>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group validate">
                                                <div class="col-md-5">
                                                    <span># Casa</span>
                                                </div>

                                                <input id="guion" placeholder="# Casa" type="text"
                                                class="form-control"
                                                name="guion" value="{{ $v->direccion[0]->numero }}" required
                                                data-validation-required-message='{{ __('validation.required') }}'>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group validate">
                                                <div class="col-md-5">
                                                    <span>Zona</span>
                                                </div>

                                                <input id="zona" placeholder="Zona" type="text"
                                                class="form-control"
                                                name="zona" value="{{ $v->direccion[0]->zona }}" required
                                                data-validation-required-message='{{ __('validation.required') }}'>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group validate">
                                                <div class="col-md-5">
                                                    <span>Colonia</span>
                                                </div>

                                                <input id="colonia" placeholder="Colonia" type="text"
                                                class="form-control"
                                                name="colonia" value="{{ $v->direccion[0]->colonia }}" required
                                                data-validation-required-message='{{ __('validation.required') }}'>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                <!-- fin direccion -->

                                <!-- inicia direccion -->
                                <div class="col-md-4 col-12">
                                    <div class="form-group validate">
                                        <div class="col-md-2">
                                            <span>Pais</span>
                                        </div>

                                        <select required="required" placeholder="Pais" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais">
                                            <option></option>
                                            @foreach ($pais as $p)
                                            <option value="{{ $p->id }}" {{ $v->direccion[0]->idPais == $p->id ? 'selected' : '' }} >{{ $p->pais }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group validate">
                                        <div class="col-md-5">
                                            <span>Departamento</span>
                                        </div>

                                        <select required="required" class="form-control @error('depto') is-invalid @enderror" id="depto" name="depto">
                                            @foreach ($depto as $d)
                                            <option value="{{ $d->id }}" {{ $v->direccion[0]->idDepartamento == $d->id ? 'selected' : '' }} >{{ $d->departamento }}</option>
                                            @endforeach
                                        </select>

                                        @error('depto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group validate">
                                        <div class="col-md-5">
                                            <span>Municipio</span>
                                        </div>

                                        <select required="required" class="form-control @error('depto') is-invalid @enderror" id="mun" name="mun">
                                        @foreach ($mun as $m)
                                            <option value="{{ $m->id }}" {{ $v->direccion[0]->idMunicipio == $m->id ? 'selected' : '' }} >{{ $m->municipio }}</option>
                                        @endforeach
                                        </select>

                                        @error('mun')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- fin direccion -->

                                <div class="col-md-8 offset-md-4">
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
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

@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset(mix('/vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
@endsection
@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>

<script>
    $(document).ready(function(e) {

        $("#pais").change(function() {
            var id = $("#pais").val();

            if (id) {
                $.ajax({
                    url: "{{ url('/depto/searchByCountry') }}/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        console.log('data => ', data);
                        $('#depto').empty();
                        $('#depto').append("<option value='0'></option>");
                        data.forEach(element => {
                            $('#depto').append("<option value='" + element['id'] +
                                "'>" + element['departamento'] + "</option>");
                        });
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                $('#det').empty();
            }

        })

        $("#depto").change(function() {
            var id = $("#depto").val();

            if (id) {
                $.ajax({
                    url: "{{ url('/mun/searchByDepto') }}/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        console.log('data => ', data);
                        $('#mun').empty();
                        $('#mun').append("<option value='0'></option>");
                        data.forEach(element => {
                            $('#mun').append("<option value='" + element['id'] +
                                "'>" + element['municipio'] + "</option>");
                        });
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                $('#det').empty();
            }

        })

    });

    function Insert() {
        var id = $("#telefono").val();
        var tableRef = document.getElementById('tel').getElementsByTagName('tbody')[0];
        var newRow = tableRef.insertRow();
        newRow.id = id;

        var newCell = newRow.insertCell(0);
        var newCellb = newRow.insertCell(1);
        var newCellc = newRow.insertCell(2);

        var newText = document.createTextNode(id);
        newCell.appendChild(newText);
        newCellb.innerHTML = "<a onclick=Remove(" + id + ")><i class=\"feather icon-trash\"></i></a></span>";

        var input = document.createElement('input');
        input.name = "tels[]";
        input.setAttribute('value', id);
        input.type = "text";
        input.hidden = true;

        newCellc.appendChild(input);

        $("#telefono").val('');
    }

    function Remove(id) {
        var row = document.getElementById(id);
        row.parentNode.removeChild(row);
    }
</script>

@endsection
