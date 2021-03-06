
@extends('layouts/contentLayoutMaster')

@section('title', 'Cotización')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection
@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/forms/wizard.css')) }}">
        <link rel="stylesheet" type="text/css" href={{ asset(mix('/css/plugins/forms/validation/form-validation.css')) }}>
@endsection
@section('content')
<section id="validation">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('cotizacion-particular.store')}}" novalidate  method="POST"  class="steps-validation wizard-circle">
                          @csrf
                        <!-- Step 1 -->
                            <h6><i class="step-icon feather icon-user"></i> Paso 1</h6>
                          <fieldset>
                            <section id="basic-tabs-components">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="card overflow-hidden">
                                    <div class="card-content">
                                      <div class="card-body">
                                        <ul class="nav nav-tabs" role="tablist">
                                          <li class="nav-item">
                                            <a class="nav-link active" id="clienteN-tab" data-toggle="tab" href="#clienteN" aria-controls="clienteN" role="tab"
                                              aria-selected="true">Nuevo Cliente</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" id="clienteO-tab" data-toggle="tab" href="#clienteO" aria-controls="clienteO"
                                              role="tab" aria-selected="false">Cliente Existente</a>
                                          </li>
                                        </ul>
                                        <div class="tab-content">
                                          <!--NUEVO CLIENTE-->
                                          <div class="tab-pane active" id="clienteN" aria-labelledby="clienteN-tab" role="tabpanel">
                                            <section id="idNewCliente">
                                            <section id="multiple-column-form">
                                              <div class="row match-height">
                                                  <div class="col-12">
                                                      <div class="card">
                                                          <div class="card-header">
                                                              <h4 class="card-title">Registro de Cliente</h4>
                                                          </div>
                                                          <div class="card-content">
                                                              <div class="card-body">
                                                                <div class="form-body">
                                                                          <div class="row">
                                                                            @csrf
                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <label for="last-name-column">DPI</label>
                                                                                    <input placeholder="DPI" id="dpi" type="text" class="form-control" name="dpi" value="{{ old('dpi') }}" aria-required="true" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[0-9]{13,13}$" data-validation-regex-message=' {{ __('validation.DPIMessage') }} '>
                                                                                    <p class="help-block"></p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                  <label for="last-name-column">Primer Nombre</label>
                                                                                    <input placeholder="Primer Nombre" id="PrimerNombre" type="text" class="form-control" name="PrimerNombre" value="{{ old('PrimerNombre') }}" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                                                                    <p class="help-block"></p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <label for="city-column">Segundo Nombre</label>
                                                                                    <input id="SegundoNombre" placeholder="Segundo Nombre" type="text" class="form-control" name="SegundoNombre" value="{{ old('SegundoNombre') }}" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                                                                    <p class="help-block"></p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <label for="country-floating">Tercer Nombre</label>
                                                                                    <input id="TercerNombre" placeholder="Tecer Nombre" type="text" class="form-control" name="TercerNombre" value="{{ old('TercerNombre') }}" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.NombreMessage') }} '>
                                                                                    <p class="help-block"></p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <label for="company-column">Primer Apellido</label>
                                                                                    <input id="PrimerApellido" placeholder="Primer Apellido" type="text" class="form-control" name="PrimerApellido" value="{{ old('PrimerApellido') }}" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>
                                                                                    <p class="help-block"></p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <label for="email-id-column">Segundo Apellido</label>
                                                                                    <input id="SegundoApellido" placeholder="Segundo Apellido" type="text" class="form-control" name="SegundoApellido" value="{{ old('SegundoApellido') }}" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>
                                                                                    <p class="help-block"></p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-group validate">
                                                                                  <label for="email-id-column">Apellido de Casado</label>
                                                                                  <input id="ApellidoCasado" placeholder="Apellido de Casado" type="text" class="form-control" name="ApellidoCasado" value="{{ old('ApellidoCasado') }}" data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" data-validation-regex-message=' {{ __('validation.ApellidoMessage') }} '>

                                                                                </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-group validate">
                                                                                  <label for="email-id-column">Fecha Nacimiento</label>
                                                                                  <input max="2020-01-01" name="fecha" id="fecha" type="date" class="form-control" value="{{ old('fecha') }}" required data-validation-required-message='{{ __('validation.required') }}'>
                                                                                  <p class="help-block"></p>
                                                                                </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </section>
                                          </section>
                                          </div>
                                          <!--CLIENTE EXISTENTE-->
                                          <div class="tab-pane" id="clienteO" aria-labelledby="clienteO-tab" role="tabpanel">
                                            <br>
                                            <br>
                                            <div class="d-flex flex-row-reverse">
                                              <div class="p-2">
                                                <div id="verifyClienteVacio" name="verifyClienteVacio" class="">
                                                  <!--<input type="text" name="" id="" required style="border:0;" required data-validation-required-message='{ __('Debe seleccionar') }}'>-->
                                                </div>
                                              </div>
                                            </div>

                                              <div class="container">
                                                <div class="row align-items-center">
                                                  <div class="col">
                                                    <p style="margin-top: 10px;" class="text-right" for="search"><strong>Busqueda</strong></p>
                                                  </div>
                                                  <div class="col w-40">
                                                    <input type="text" class="form-control" style="" id="search">
                                                  </div>
                                                  <div class="col-4">
                                                  </div>
                                                </div>
                                                <br>
                                                <br>
                                              </div>

                                              <div class="table-responsive">
                                                <table id="tablac" class="table">
                                                    <thead>
                                                        <tr style="cursor: pointer;">
                                                            <th></th>
                                                            <th scope="col">DPI</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Apellido</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="datos">

                                                    </tbody>
                                                  </table>
                                            </div>
                                            <div id="select_cliente">

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                          </fieldset>

                            <!-- Step 2 -->
                            <h6><i class="step-icon feather icon-truck"></i> Paso 2</h6>
                            <fieldset>
                              <section id="basic-tabs-components">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card overflow-hidden">
                                      <div class="card-content">
                                        <div class="card-body">
                                          <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                              <a class="nav-link active" id="vehiculoN-tab" data-toggle="tab" href="#vehiculoN" aria-controls="vehiculoN" role="tab"
                                                aria-selected="true">Nuevo Vehiculo</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="vehiculoO-tab" data-toggle="tab" href="#vehiculoO" aria-controls="vehiculoO"
                                                role="tab" aria-selected="false">Vehiculo Existente</a>
                                            </li>
                                          </ul>
                                          <div class="tab-content">
                                            <div class="tab-pane active" id="vehiculoN" aria-labelledby="vehiculoN-tab" role="tabpanel">
                                              <!--NUEVO VEHICULO-->
                                          <section id="idNewVehiculo">
                                            <section id="multiple-column-form">
                                              <div class="row match-height">
                                                  <div class="col-12">
                                                      <div class="card">
                                                          <div class="card-header">
                                                              <h4 class="card-title">Registro de Vehiculo</h4>
                                                          </div>
                                                          <div class="card-content">
                                                              <div class="card-body">
                                                                <div class="form-body">
                                                                          <div class="row">
                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <p for="exampleFormControlInput1"><strong>Marca</strong></p>
                                                                                    <select required class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca">
                                                                                      <option value="-1">Seleccione una marca</option>
                                                                                      @foreach ($marcas as $marca)
                                                                                        <option value="{{$marca->id}}">{{$marca->marca}}</option>
                                                                                      @endforeach
                                                                                    </select>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-group validate">
                                                                                  <p><strong>Placa</strong></p>
                                                                                  <input id="placa" placeholder="Placa" type="text" class="form-control" name="placa" value="{{ old('year') }}" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^([A,C,CC,CD,M,MI,O,P,TC,U]{1,2})(\d{3})([A-Z]{3})+$" data-validation-regex-message=' {{ __('validation.PlacaMessage') }} '>
                                                                                  <p class="help-block"></p>
                                                                                </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <p for="exampleFormControlSelect1"><strong>Modelo</strong></p>
                                                                                    <select class="form-control" id="modelo" name="modelo">
                                                                                    </select>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-group validate">
                                                                                  <p><strong>Chasis</strong></p>
                                                                                  <input id="chasis" placeholder="Chasis" type="text" class="form-control" name="chasis" value="{{ old('year') }}" required data-validation-required-message='{{ __('validation.required') }}'>
                                                                                  <p class="help-block"></p>
                                                                                </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <p for="exampleFormControlSelect2"><strong>Tipo</strong></p>
                                                                                    <select class="form-control" id="tipo" name="tipo" required>
                                                                                      <option value="-1">Seleccione el tipo de vehículo</option>
                                                                                      @foreach ($tipos as $tipo)
                                                                                        <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                                                                      @endforeach
                                                                                    </select>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-group validate">
                                                                                  <p><strong>Motor</strong></p>
                                                                                  <input id="motor" placeholder="Motor" type="text" class="form-control" name="motor" required data-validation-required-message='{{ __('validation.required') }}'>
                                                                                  <p class="help-block"></p>
                                                                                </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <p for="exampleFormControlTextarea1"><strong>Año</strong></p>
                                                                                    <input id="year" placeholder="Año" type="text" class="form-control" name="year" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^[0-9]{4}$" data-validation-regex-message=' {{ __('validation.YearMessage') }} '>
                                                                                    <p class="help-block"></p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-group validate">
                                                                                  <p><strong>Color</strong></p>
                                                                                  <input id="color" type="text" class="form-control" name="color" placeholder="Color" required data-validation-required-message='{{ __('validation.required') }}'>
                                                                                  <p class="help-block"></p>
                                                                                </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </section>
                                          </section>

                                            </div>
                                            <!--VEHICULO EXISTENTE-->
                                            <div class="tab-pane" id="vehiculoO" aria-labelledby="vehiculoO-tab" role="tabpanel">
                                            <br>
                                            <br>
                                              <div class="container">
                                                <div class="row align-items-center">
                                                  <div class="col">
                                                    <p style="margin-top: 10px;" class="text-right" for="search"><strong>Busqueda</strong></p>
                                                  </div>
                                                  <div class="col w-30">
                                                    <input type="text" class="form-control" style="" id="search2">
                                                  </div>
                                                  <div class="col-4">
                                                  </div>
                                                </div>
                                                <br>
                                                <br>
                                              </div>

                                              <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr style="cursor: pointer;">
                                                            <th scope="col">Placa</th>
                                                            <th scope="col">Marca</th>
                                                            <th scope="col">Modelo</th>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Color</th>
                                                            <th scope="col">Año</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="vehiculos">

                                                    </tbody>
                                                  </table>
                                            </div>
                                            <div id="select_vehiculo">

                                            </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </section>
                            </fieldset>

                            <!-- Step 3 -->
                            <h6><i class="step-icon feather icon-book-open"></i> Paso 3</h6>
                            <fieldset>
                              <section id="basic-tabs-components">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card overflow-hidden">

                                      <div class="card-content">
                                        <div class="card-body">

                                          <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" aria-controls="home" role="tab"
                                                aria-selected="true">Repuestos Reparación</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile"
                                                role="tab" aria-selected="false">Mano Obra</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" aria-controls="about" role="tab"
                                                aria-selected="false">Otros Trabajos</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="about2-tab" data-toggle="tab" href="#about2" aria-controls="about2" role="tab"
                                                aria-selected="false">Notas</a>
                                            </li>
                                          </ul>
                                          <div class="tab-content">
                                            <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                              <br>
                                                <div class="form-row">
                                                  <div class="form-group validate col-md-6">
                                                    <label for="inputCity"><strong>Descripción</strong></label>
                                                    <input type="text" class="form-control" id="descRepuesto" name="" placeholder="Descripción">
                                                    <label id="desc" class="text-danger"></label>
                                                  </div>
                                                  <div class="form-group validate col-md-4">
                                                    <label for="inputState"><strong>Cantidad</strong></label>
                                                    <input type="text" class="form-control" id="cntRepuesto" name="" placeholder="Cantidad">
                                                    <label id="cnt" class="text-danger"></label>
                                                  </div>
                                                  <div class="form-group validate col-md-2">
                                                    <label for="contact-info-vertical"><strong>Valor</strong></label>
                                                    <input type="text" id="valRepuesto" class="form-control" placeholder="C/U">
                                                    <label id="val" class="text-danger"></label>
                                                  </div>
                                                </div>
                                                <a class="btn btn-success" onclick="agregarRepuesto();">Agregar</a>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <div class="table-responsive">
                                                  <table id="repuestos" name="repuestos" class="table table-hover-animation table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th>Descripción</th>
                                                              <th>Cantidad</th>
                                                              <th>Valor</th>
                                                              <th>Total</th>
                                                              <th colspan="5"></th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>

                                                      </tbody>
                                                      <tfoot>
                                                        <tr>
                                                            <th>Total Repuestos</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th id="resultado" name="resultado">0.00</th>
                                                        </tr>
                                                    </tfoot>
                                                  </table>
                                              </div>
                                            </div>
                                            <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                              <section id="basic-vertical-layouts">
                                                <div class="row match-height">
                                                    <div class="col-md-6 col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="form form-vertical">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group validate">
                                                                                        <label for="first-name-vertical"><strong>Descripción</strong></label>
                                                                                        <input type="text" id="MOD" class="form-control" placeholder="Descripción">
                                                                                        <label id="verifyMOD" class="text-danger"></label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="form-group validate">
                                                                                        <label for="contact-info-vertical"><strong>Costo</strong></label>
                                                                                        <input type="text" id="MOC" class="form-control" placeholder="Costo">
                                                                                        <label id="verifyMOC" class="text-danger"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <a class="btn btn-success" onclick="agregarManoObra();">Agregar</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="form form-vertical">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                  <div class="table-responsive">
                                                                                    <table id="MOT" name="MOT" class="table table-hover-animation table-striped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Descripción</th>
                                                                                                <th>Costo</th>
                                                                                                <th colspan="4"></th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                          <tr>
                                                                                              <th>Total Mano Obra</th>
                                                                                              <th id="resultadoMO" name="resultadoMO">0.00</th>
                                                                                          </tr>
                                                                                      </tfoot>
                                                                                    </table>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </section>
                                            </div>
                                            <div class="tab-pane" id="about" aria-labelledby="about-tab" role="tabpanel">
                                              <section id="basic-vertical-layouts">
                                                <div class="row match-height">
                                                    <div class="col-md-6 col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="form form-vertical">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group validate">
                                                                                        <label for="first-name-vertical"><strong>Descripción</strong></label>
                                                                                        <input type="text" id="OTD" class="form-control" placeholder="Descripción">
                                                                                        <label id="verifyOTD" class="text-danger"></label>
                                                                                      </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="form-group validate">
                                                                                        <label for="contact-info-vertical"><strong>Costo</strong></label>
                                                                                        <input type="text" id="OTC" class="form-control" placeholder="Costo">
                                                                                        <label id="verifyOTC" class="text-danger"></label>
                                                                                      </div>
                                                                                </div>
                                                                            </div>
                                                                            <a class="btn btn-success" onclick="agregarOthers();">Agregar</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="form form-vertical">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                  <div class="table-responsive">
                                                                                    <table id="OTT" name="OTT" class="table table-hover-animation table-striped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Descripción</th>
                                                                                                <th>Costo</th>
                                                                                                <th colspan="4"></th>
                                                                                              </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                          <tr>
                                                                                              <th>Total Otros Trabajos</th>
                                                                                              <th id="resultadoOT" name="resultadoOT">0.00</th>
                                                                                          </tr>
                                                                                      </tfoot>
                                                                                    </table>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </section>
                                            </div>
                                            <div class="tab-pane" id="about2" aria-labelledby="about2-tab" role="tabpanel">
                                              <section id="multiple-column-form">
                                                <div class="row match-height">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                  <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-12">
                                                                                    <div class="form-group validate">
                                                                                      <p for="first-name-vertical"><strong>KMS Ingreso</strong></p>
                                                                                      <input type="text" id="kmi" name="kmi" class="form-control" placeholder="KMS Ingreso" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^\d+$" data-validation-regex-message=' {{ __('validation.OnlyNumberMessage') }} '>
                                                                                      <p class="help-block"></p>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6 col-12">
                                                                                  <div class="form-group validate">
                                                                                    <p for="contact-info-vertical"><strong>KMS Proximo Servicio</strong></p>
                                                                                    <input type="text" id="kmn" name="kmn" class="form-control" placeholder="KMS Proximo Servicio" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^\d+$" data-validation-regex-message=' {{ __('validation.OnlyNumberMessage') }} '>
                                                                                    <p class="help-block"></p>
                                                                                  </div>
                                                                                </div>

                                                                                <div class="col-12">
                                                                                    <div class="form-label-group">
                                                                                      <p for="contact-info-vertical"><strong>Notas Generales</strong></p>
                                                                                      <textarea class="form-control" id="notasg" name="notasg" rows="5" placeholder="Notas Generales"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </section>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </section>
                            </fieldset>
                            <div id="NewOldCliente" style="display: none;">
                              <input id="NewOldClienteSelect" type="text" class="form-control" name="NewOldClienteSelect" value="CNew">
                            </div>
                            <div id="NewOldVehiculo" style="display: none;">
                              <input id="NewOldVehiculoSelect" type="text" class="form-control" name="NewOldVehiculoSelect" value="VNew">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
  $(document).ready(function(e){

    $("#search").keyup(function () {
      var dato = $("#search").val();
      if (dato) {
        $.ajax({
          url: "{{url('/filtro_cliente')}}/" + dato,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            console.log('data => ',data);
            $('#datos').empty();
            data.forEach(element => {
              $('#datos').append("<tr onclick='cliente_seleccionado(this,"+element['id']+")' value='"+element['id']+"' style='cursor: pointer;'><td><input type='radio' name='select_cliente' style='cursor: pointer;' required></input></td><td>"+element['dpi']+"</td><td>"+element['primerNombre']+" "+element['segundoNombre']+"</td><td>"+element['primerApellido']+" "+element['segundoApellido']+"</td></tr>");
            });
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      } else {
        $('#datos').empty();
      }
    });

    $("#clienteN-tab").click(function () {
      var sections2 = document.getElementById('idNewCliente');
      for(var i = 0; i < sections2.getElementsByTagName("INPUT").length; ++i) {
        sections2.getElementsByTagName("INPUT")[i].setAttribute("value", "");
      }
      $('#search').val('');
      $('#datos').empty();
      $('#NewOldCliente').empty();
      $('#NewOldCliente').append("<input id='NewOldClienteSelect' type='text' class='form-control' name='NewOldClienteSelect' value='CNew'>");
    });

    $("#clienteO-tab").click(function () {
      document.getElementById('dpi').setAttribute('value', '1234567890123');
      document.getElementById('PrimerNombre').setAttribute('value', 'prueba');
      document.getElementById('SegundoNombre').setAttribute('value', 'prueba');
      document.getElementById('PrimerApellido').setAttribute('value', 'prueba');
      document.getElementById('SegundoApellido').setAttribute('value', 'prueba');
      document.getElementById('fecha').setAttribute('value', '1997-01-01');

      //$('#verifyClienteVacio').empty();
      //$('#verifyClienteVacio').append("<input id='req' name='req' type='text' class='form-control' required>");
      //$('#req').hide();

      $('#search').val('');
      $('#datos').empty();
      $('#NewOldCliente').empty();
      $('#NewOldCliente').append("<input id='NewOldClienteSelect' type='text' class='form-control' name='NewOldClienteSelect' value='COld'>");
    });

    $("#vehiculoN-tab").click(function () {
      var sections2 = document.getElementById('idNewVehiculo');
      for(var i = 0; i < sections2.getElementsByTagName("INPUT").length; ++i) {
        sections2.getElementsByTagName("INPUT")[i].setAttribute("value", "");
      }
      $('#search2').val('');
      $('#vehiculos').empty();
      $('#NewOldVehiculo').empty();
      $('#NewOldVehiculo').append("<input id='NewOldVehiculoSelect' type='text' class='form-control' name='NewOldVehiculoSelect' value='VNew'>");
    });

    $("#vehiculoO-tab").click(function () {
      document.getElementById('marca').setAttribute('value', 'prueba');
      document.getElementById('tipo').setAttribute('value', 'prueba');
      document.getElementById('year').setAttribute('value', '1111');
      document.getElementById('placa').setAttribute('value', 'P111ABC');
      document.getElementById('chasis').setAttribute('value', 'prueba');
      document.getElementById('motor').setAttribute('value', 'prueba');
      document.getElementById('color').setAttribute('value', 'prueba');
      $('#search2').val('');
      $('#vehiculos').empty();
      $('#NewOldVehiculo').empty();
      $('#NewOldVehiculo').append("<input id='NewOldVehiculoSelect' type='text' class='form-control' name='NewOldVehiculoSelect' value='VOld'>");
    });

    $("#search2").keyup(function () {
      var dato = $("#search2").val();
      if (dato) {
        //alert(dato);
        $.ajax({
          url: "{{url('/filtro_vehiculo')}}/" + dato,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            console.log('data => ',data);
            $('#vehiculos').empty();
            data.forEach(element => {
              $('#vehiculos').append("<tr onclick='vehiculo_seleccionado("+element['id']+")' value='"+element['id']+"' style='cursor: pointer;'><td><input type='radio' name='select_vehiculo' style='cursor: pointer;' required></input></td><td>"+element['placa']+"</td><td>"+element['marca'][0].marca+"</td><td>"+element['modelo'][0].modelo+"</td><td>"+element['tipovehiculo'][0].tipo+"</td><td>"+element['color']+"</td><td>"+element['año']+"</td></tr>");
            });
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      } else {
        $('#vehiculos').empty();
      }
    });

    $("#marca").change(function(){

      var id = $("#marca").val();
      if(id){
        $.ajax({
          url: "{{url('/filtro')}}/" + id,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            console.log('data => ',data);
            $('#modelo').empty();
            data.forEach(element => {
              $('#modelo').append("<option value='"+ element['id'] +"'>"+element['modelo']+"</option>");
            });
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      } else {
        $('#modelo').empty();
      }

    })

  });
</script>
<script>
  function cliente_seleccionado (tr,value) {
     $('#select_cliente').empty();
    //$('#select_cliente').append("<input value='"+value+"' id='cliente_id'></input>");
    $('#select_cliente').append("<input value='"+value+"' id='cliente_id' type='text' class='form-control' name='cliente_id' >")
    $('#select_cliente').hide();
    //$(tr).css("background-color", "#BEDAE8");

    console.log("value => ", value);
  };

  function vehiculo_seleccionado (value) {
    $('#select_vehiculo').empty();
    //$('#select_cliente').append("<input value='"+value+"' id='cliente_id'></input>");
    $('#select_vehiculo').append("<input value='"+value+"' id='vehiculo_id' type='text' class='form-control' name='vehiculo_id' >")
    $('#select_vehiculo').hide();
    console.log("value => ", value);
  };

  function agregarRepuesto() {
    var estado = false;
    let total = 0;
    var desc = $("#descRepuesto").val();
    var cnt = $('#cntRepuesto').val();
    var valor = $('#valRepuesto').val();
    var cnt2 = parseInt(cnt);
    var valor2 = parseFloat(valor);
    var pa3 =  /^\d*$/;
    var pa2 = /^\d*(\.\d{0,})$/;

    var descb = "0";
    var cntb = "0";
    var valorb = "0";

    if (desc == ''){
      document.getElementById('desc').innerHTML = 'Este campo es requerido';
      descb = "1";
    } else {
      document.getElementById('desc').innerHTML = '';
        descb = "0";
    }

    if (cnt == '') {
      document.getElementById('cnt').innerHTML = 'Este campo es requerido';
      cntb = "1";
    } else if (pa3.test(cnt)) {
      if (cnt2 < 1) {
        document.getElementById('cnt').innerHTML = 'Debe ingresar un valor mayor que 0';
        cntb = "1";
      } else {
        document.getElementById('cnt').innerHTML = '';
        cntb = "0";
      }
    } else {
      document.getElementById('cnt').innerHTML = 'Debe ingresar unicamente digitos';
      cntb = "1";
    }

    if (valor == '') {
      document.getElementById('val').innerHTML = 'Este campo es requerido';
      valorb = "1";
    } else if (pa2.test(valor) || pa3.test(valor)) {
      if (valor2 < 0.0000000000001) {
        document.getElementById('val').innerHTML = 'Debe ingresar un valor mayor que 0';
        valorb = "1";
      } else {
        document.getElementById('val').innerHTML = '';
        valorb = "0";
      }
    } else {
      document.getElementById('val').innerHTML = 'Debe ingresar unicamente digitos';
      valorb = "1";
    }

    if ((descb == "0") && (cntb == "0") && (valorb == "0")) {
      estado = false;
    } else {
      estado = true
    }

    if (estado == true) {
      return false;
    } else {
      var val_f = parseFloat(valor);
      var x = val_f.toFixed(2);
      var resultado = (parseInt(cnt) * x);
      resultado.toFixed(2);
      var to_valor = parseFloat(valor);
      to_valor.toFixed(2);
                var tableRef = document.getElementById('repuestos').getElementsByTagName('tbody')[0];
                var newRow = tableRef.insertRow();
                var newCell = newRow.insertCell(0);
                var newCell2 = newRow.insertCell(1);
                var newCell3 = newRow.insertCell(2);
                var newCell4 = newRow.insertCell(3);
                var newCellb = newRow.insertCell(4);
                var newCellc = newRow.insertCell(5);
                var newCelld = newRow.insertCell(6);
                var newCelle = newRow.insertCell(7);
                var newCelleTotal = newRow.insertCell(8);
                var newText = document.createTextNode(desc);
                var newText2 = document.createTextNode(cnt);
                var newText3 = document.createTextNode(to_valor.toFixed(2));
                var newText4 = document.createTextNode(resultado.toFixed(2));
                newCell.appendChild(newText);
                newCell2.appendChild(newText2);
                newCell3.appendChild(newText3);
                newCell4.appendChild(newText4);

                newCellb.innerHTML = "<a class='borrarR'><i class=\"feather icon-trash\"></i></a></span>";

                var input = document.createElement('input');
                input.name = "repuestosD[]";
                input.setAttribute('value', desc);
                input.type = "text";
                input.hidden =true;
                newCellc.appendChild(input);

                var input2 = document.createElement('input');
                input2.name = "repuestosC[]";
                input2.setAttribute('value', cnt);
                input2.type = "text";
                input2.hidden =true;
                newCelld.appendChild(input2);

                var input3 = document.createElement('input');
                input3.name = "repuestosV[]";
                input3.setAttribute('value', to_valor.toFixed(2));
                input3.type = "text";
                input3.hidden =true;
                newCelle.appendChild(input3);

                $("#repuestos tbody tr").each(function(idx, fila) {

                  total += parseFloat(fila.children[3].innerHTML);
                })
                document.getElementById('resultado').textContent = total.toFixed(2);

                var input4 = document.createElement('input');
                input4.name = "TotalEncabezado[]";
                input4.setAttribute('value', resultado.toFixed(2));
                input4.type = "text";
                input4.hidden =true;
                newCelleTotal.appendChild(input4);

                $('#descRepuesto').val('');
                $('#cntRepuesto').val('');
                $('#valRepuesto').val('');


    }
  };

  $(document).on('click', '.borrarR', function (event) {
    let total = 0;
    event.preventDefault();
    $(this).closest('tr').remove();
    $("#repuestos tbody tr").each(function(idx, fila) {
      total += parseFloat(fila.children[3].innerHTML);
    })
    document.getElementById('resultado').textContent = total.toFixed(2);

  });

  function agregarManoObra() {
    var estado = false;
    let total = 0;
    var desc = $("#MOD").val();
    var valor = $('#MOC').val();
    var valor2 = parseFloat(valor);
    var pa3 = /\d$/;
    var pa4 = /^\d/;
    var pa2 = /^\d*(\.\d{0,2})$/;

    var descb = "0";
    var valorb = "0";

    if (desc == ''){
      document.getElementById('verifyMOD').innerHTML = 'Este campo es requerido';
      descb = "1";
    } else {
      document.getElementById('verifyMOD').innerHTML = '';
      descb = "0";
    }

    if (valor == '') {
      document.getElementById('verifyMOC').innerHTML = 'Este campo es requerido';
      valorb = "1";
    } else if(pa2.test(valor) || (pa3.test(valor) && pa4.test(valor))){
      if (valor2 < 0.0000000000001) {
        document.getElementById('verifyMOC').innerHTML = 'Debe ingresar un valor mayor que 0';
        valorb = "1";
      } else {
        document.getElementById('verifyMOC').innerHTML = '';
        console.log(valor2.toFixed(2));
        valorb = "0";
      }
    } else {
      document.getElementById('verifyMOC').innerHTML = 'Debe ingresar unicamente digitos';
      valorb = "1";
    }

    if ((descb == '0') && (valorb == '0')) {
      estado = false;
    } else {
      estado = true
    }

    if (estado == true) {
      return false
    } else {
                var tableRef = document.getElementById('MOT').getElementsByTagName('tbody')[0];
                var newRow = tableRef.insertRow();

                var newCell = newRow.insertCell(0);
                var newCell2 = newRow.insertCell(1);
                var newCellb = newRow.insertCell(2);
                var newCellc = newRow.insertCell(3);
                var newCelld = newRow.insertCell(4);
                var newCelldTotal = newRow.insertCell(5);
                var newText = document.createTextNode(desc);
                var newText2 = document.createTextNode(valor2.toFixed(2));
                newCell.appendChild(newText);
                newCell2.appendChild(newText2);

                newCellb.innerHTML = "<a class='borrarMO'><i class=\"feather icon-trash\"></i></a></span>";

                var input = document.createElement('input');
                input.name = "MOD[]";
                input.setAttribute('value', desc);
                input.type = "text";
                input.hidden =true;
                newCellc.appendChild(input);

                var input2 = document.createElement('input');
                input2.name = "MOC[]";
                input2.setAttribute('value', valor2.toFixed(2));
                input2.type = "text";
                input2.hidden =true;
                newCellc.appendChild(input2);

                $("#MOT tbody tr").each(function(idx, fila) {

                  total += parseFloat(fila.children[1].innerHTML);
                })
                document.getElementById('resultadoMO').textContent = total.toFixed(2);

                var input4 = document.createElement('input');
                input4.name = "TotalEncabezado[]";
                input4.setAttribute('value', valor2.toFixed(2));
                input4.type = "text";
                input4.hidden =true;
                newCelldTotal.appendChild(input4);

                $("#MOD").val('');
                $('#MOC').val('');
    }
  };

  $(document).on('click', '.borrarMO', function (event) {
    let total = 0;
    event.preventDefault();
    $(this).closest('tr').remove();
    $("#MOT tbody tr").each(function(idx, fila) {
      total += parseFloat(fila.children[1].innerHTML);
    })
    document.getElementById('resultadoMO').textContent = total.toFixed(2);

  });

  function agregarOthers() {
    var estado = false;
    let total = 0;
    var desc = $("#OTD").val();
    var valor = $('#OTC').val();
    var valor2 = parseFloat(valor);
    var pa3 = /\d$/;
    var pa4 = /^\d/;
    var pa2 = /^\d*(\.\d{0,2})$/;

    var descb = "0";
    var valorb = "0";

    if (desc == ''){
      document.getElementById("verifyOTD").innerHTML = 'Este campo es requerido';
      descb = "1";
    } else {
      document.getElementById("verifyOTD").innerHTML = '';
      descb = "0";
    }

    if (valor == '') {
      document.getElementById("verifyOTC").innerHTML = 'Este campo es requerido';
      valorb = "1";
    } else if(pa2.test(valor) || (pa3.test(valor) && pa4.test(valor))){
      if (valor2 < 0.0000000000001) {
        document.getElementById("verifyOTC").innerHTML = 'Debe ingresar un valor mayor que 0';
        valorb = "1";
      } else {
        document.getElementById("verifyOTC").innerHTML = '';
        valorb = "0";
      }
    } else {
      document.getElementById("verifyOTC").innerHTML = 'Debe ingresar unicamente digitos';
      valorb = "1";
    }

    if ((descb == '0') && (valorb == '0')) {
      estado = false;
    } else {
      estado = true;
    }

    if (estado == true) {
      return false
    } else {
                var tableRef = document.getElementById('OTT').getElementsByTagName('tbody')[0];
                var newRow = tableRef.insertRow();

                var newCell = newRow.insertCell(0);
                var newCell2 = newRow.insertCell(1);
                var newCellb = newRow.insertCell(2);
                var newCellc = newRow.insertCell(3);
                var newCelld = newRow.insertCell(4);
                var newCelldTotal = newRow.insertCell(5);
                var newText = document.createTextNode(desc);
                var newText2 = document.createTextNode(valor2.toFixed(2));
                newCell.appendChild(newText);
                newCell2.appendChild(newText2);

                newCellb.innerHTML = "<a class='borrarOT'><i class=\"feather icon-trash\"></i></a></span>";

                var input = document.createElement('input');
                input.name = "OTD[]";
                input.setAttribute('value', desc);
                input.type = "text";
                input.hidden =true;
                newCellc.appendChild(input);

                var input2 = document.createElement('input');
                input2.name = "OTC[]";
                input2.setAttribute('value', valor2.toFixed(2));
                input2.type = "text";
                input2.hidden =true;
                newCelld.appendChild(input2);

                $("#OTT tbody tr").each(function(idx, fila) {

                  total += parseFloat(fila.children[1].innerHTML);
                })
                document.getElementById('resultadoOT').textContent = total.toFixed(2);

                var input4 = document.createElement('input');
                input4.name = "TotalEncabezado[]";
                input4.setAttribute('value', valor2.toFixed(2));
                input4.type = "text";
                input4.hidden =true;
                newCelldTotal.appendChild(input4);

                $("#OTD").val('');
                $('#OTC').val('');
    }
  };

  $(document).on('click', '.borrarOT', function (event) {
    let total = 0;
    event.preventDefault();
    $(this).closest('tr').remove();
    $("#OTT tbody tr").each(function(idx, fila) {
      total += parseFloat(fila.children[1].innerHTML);
    })
    document.getElementById('resultadoOT').textContent = total.toFixed(2);

  });

</script>
<!-- Form wizard with step validation section end -->
@endsection


@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset(mix('vendors/js/extensions/jquery.steps.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
        <script src="{{ asset(mix('/vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/forms/wizard-steps.js')) }}"></script>
        <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
@endsection
