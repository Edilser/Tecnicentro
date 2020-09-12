@extends('layouts/contentLayoutMaster')

@section('title', 'Clientes')

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
                    <h4 class="card-title">Registro de Cliente</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- form debe contener novalidate -->
                        <form method="POST" action="{{ route('cliente.store') }}" novalidate class="form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <!-- input debe contener required-->
                                            <label for="last-name-column">DPI</label>
                                            <input type="text" id="dpi" class="form-control" name="dpi" placeholder="DPI" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[0-9]{13,13}$" data-validation-regex-message=' {{ __('validation.DPIMessage') }} '>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <!-- input debe contener required-->
                                            <label for="last-name-column">Primer Nombre</label>
                                            <input type="text" id="PrimerNombre" class="form-control" name="PrimerNombre" placeholder="Primer Nombre" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+([a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <!-- input debe contener required-->
                                            <label for="last-name-column">Segundo Nombre</label>
                                            <input type="text" id="SegundoNombre" class="form-control" name="SegundoNombre" placeholder="Segundo Nombre"  data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+([a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <!-- input debe contener required-->
                                            <label for="last-name-column">Tercer Nombre</label>
                                            <input type="text" id="TercerNombre" class="form-control" name="TercerNombre" placeholder="Tecer Nombre" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+([a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <!-- input debe contener required-->
                                            <label for="last-name-column">Primer Apellido</label>
                                            <input type="text" id="PrimerApellido" class="form-control" name="PrimerApellido" placeholder="Primer Apellido" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+([a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <!-- input debe contener required-->
                                            <label for="last-name-column">Segundo Apellido</label>
                                            <input type="text" id="SegundoApellido" class="form-control" name="SegundoApellido" placeholder="Segundo Apellido" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+([a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <!-- input debe contener required-->
                                            <label for="last-name-column">Apellido de Casado</label>
                                            <input type="text" id="ApellidoCasado" class="form-control" name="ApellidoCasado" placeholder="Apellido de Casado" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+([a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <!-- input debe contener required-->
                                            <label for="last-name-column">Fecha Nacimiento</label>
                                            <input type="date" id="fecha" class="form-control" name="fecha" required data-validation-required-message='{{ __('validation.required') }}'>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group validate">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                    <!-- input debe contener required-->
                                                    <label for="last-name-column">Telefono</label>
                                                    <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Telefono" data-validation-regex-regex="^[0-9]{8,8}$" data-validation-regex-message=' {{ __('validation.TelefonoMessage') }} '>
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

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-12">
                                        <div class="form-group validate">
                                            <div class="col-md-2">
                                                <span>Pais</span>
                                            </div>
                                            <select required="required" placeholder="Pais" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais">
                                                <option></option>
                                                @foreach ($pais as $p)
                                                <option value="{{ $p->id }}">{{ $p->pais }}</option>
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
                                                <option></option>
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
                                                <option></option>
                                            </select>

                                            @error('mun')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-8 offset-md-4">
                                        <a href="{{ URL::previous() }}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
                                    </div>


                                </div>
                            </div>
                        </form>
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