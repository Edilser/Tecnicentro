
@extends('layouts/contentLayoutMaster')

@section('title', 'Cotización')

@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/forms/wizard.css')) }}">
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
                        <form action="{{route('cotizacion-moto.store')}}"  method="POST"  class="steps-validation wizard-circle">
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
                                                                                  <div class="form-label-group">
                                                                                    <input placeholder="DPI" id="dpi" type="text" class="form-control @error('dpi') is-invalid @enderror" name="dpi" value="{{ old('dpi') }}">
                                                                                      <label for="last-name-column">DPI</label>

                                                                                      @error('dpi')
                                                                                          <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                          </span>
                                                                                      @enderror
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-label-group">
                                                                                    <input placeholder="Primer Nombre" id="PrimerNombre" type="text" class="form-control @error('PrimerNombre') is-invalid @enderror" name="PrimerNombre" value="{{ old('PrimerNombre') }}">
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
                                                                                    <input id="SegundoNombre" placeholder="Segundo Nombre" type="text" class="form-control @error('SegundoNombre') is-invalid @enderror" name="SegundoNombre" value="{{ old('SegundoNombre') }}">
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
                                                                                    <input id="TercerNombre" placeholder="Tecer Nombre" type="text" class="form-control @error('TercerNombre') is-invalid @enderror" name="TercerNombre" value="{{ old('TercerNombre') }}">

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
                                                                                    <input id="PrimerApellido" placeholder="Primer Apellido" type="text" class="form-control @error('PrimerApellido') is-invalid @enderror" name="PrimerApellido" value="{{ old('PrimerApellido') }}">

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
                                                                                    <input id="SegundoApellido" placeholder="Segundo Apellido" type="text" class="form-control @error('SegundoApellido') is-invalid @enderror" name="SegundoApellido" value="{{ old('SegundoApellido') }}">

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
                                                                                  <input id="ApellidoCasado" placeholder="Apellido de Casado" type="text" class="form-control @error('ApellidoCasado') is-invalid @enderror" name="ApellidoCasado" value="{{ old('ApellidoCasado') }}">

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
                                                                                  <input name="fecha" id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}">
                                                                                  <label for="email-id-column">Fecha Nacimiento</label>
                                                                                  @error('fecha')
                                                                                  <span class="invalid-feedback" role="alert">
                                                                                      <strong>{{ $message }}</strong>
                                                                                  </span>
                                                                              @enderror
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
                                          <!--CLIENTE EXISTENTE-->
                                          <div class="tab-pane" id="clienteO" aria-labelledby="clienteO-tab" role="tabpanel">
                                            <br>
                                            <br>
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
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr style="cursor: pointer;">

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
                                                                                  <div class="form-label-group">
                                                                                    <p for="exampleFormControlInput1"><strong>Marca</strong></p>
                                                                                    <select required="required" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca">
                                                                                      <option value="-1">Seleccione una marca</option>
                                                                                      @foreach ($marcas as $marca)
                                                                                        <option value="{{$marca->id}}">{{$marca->marca}}</option>
                                                                                      @endforeach
                                                                                    </select>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-label-group">
                                                                                  <p><strong>Placa</strong></p>
                                                                                  <input id="placa" placeholder="Placa" type="text" class="form-control @error('placa') is-invalid @enderror" name="placa" value="{{ old('year') }}">
                                                                                </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-label-group">
                                                                                    <p for="exampleFormControlSelect1"><strong>Modelo</strong></p>
                                                                                    <select class="form-control" id="modelo" name="modelo">
                                                                                    </select>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-label-group">
                                                                                  <p><strong>Chasis</strong></p>
                                                                                  <input id="chasis" placeholder="Chasis" type="text" class="form-control @error('chasis') is-invalid @enderror" name="chasis" value="{{ old('year') }}">
                                                                                </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-label-group">
                                                                                    <p for="exampleFormControlSelect2"><strong>Tipo</strong></p>
                                                                                    <select required="required" class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                                                                                      <option value="-1">Seleccione el tipo de vehículo</option>
                                                                                      @foreach ($tipos as $tipo)
                                                                                        <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                                                                      @endforeach
                                                                                    </select>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-label-group">
                                                                                  <p><strong>Motor</strong></p>
                                                                                  <input id="motor" placeholder="Motor" type="text" class="form-control @error('motor') is-invalid @enderror" name="motor">
                                                                                </div>
                                                                              </div>

                                                                              <div class="col-md-6 col-12">
                                                                                  <div class="form-label-group">
                                                                                    <p for="exampleFormControlTextarea1"><strong>Año</strong></p>
                                                                                    <input id="year" placeholder="Año" type="number" class="form-control @error('year') is-invalid @enderror" name="year">
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-12">
                                                                                <div class="form-label-group">
                                                                                  <p><strong>Color</strong></p>
                                                                                  <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" placeholder="Color">
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
                                            <!--<li class="nav-item">
                                              <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" aria-controls="about" role="tab"
                                                aria-selected="false">Otros Trabajos</a>
                                            </li>-->
                                            <li class="nav-item">
                                              <a class="nav-link" id="about2-tab" data-toggle="tab" href="#about2" aria-controls="about2" role="tab"
                                                aria-selected="false">Notas</a>
                                            </li>
                                          </ul>
                                          <div class="tab-content">
                                            <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                              <br>
                                                <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                    <label for="inputCity"><strong>Descripción</strong></label>
                                                    <input type="text" class="form-control" id="descRepuesto" name="" placeholder="Descripción">
                                                    <label id="desc" class="text-danger" style="display:none">El campo es requerido.</label>
                                                  </div>
                                                  <div class="form-group col-md-4">
                                                    <label for="inputState"><strong>Cantidad</strong></label>
                                                    <input type="number" class="form-control" id="cntRepuesto" name="" placeholder="Cantidad">
                                                    <label id="cnt" class="text-danger" style="display:none">El campo es requerido.</label>
                                                  </div>
                                                  <div class="form-group col-md-2">
                                                    <label for="contact-info-vertical"><strong>Valor</strong></label>
                                                    <input type="number" id="valRepuesto" class="form-control" placeholder="C/U">
                                                    <label id="val" class="text-danger" style="display:none">El campo es requerido.</label>
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
                                                                                    <div class="form-group">
                                                                                        <label for="first-name-vertical"><strong>Descripción</strong></label>
                                                                                        <input type="text" id="MOD" class="form-control" placeholder="Descripción">
                                                                                        <label id="MODdesc" class="text-danger" style="display:none">El campo es requerido.</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="contact-info-vertical"><strong>Costo</strong></label>
                                                                                        <input type="number" id="MOC" class="form-control" placeholder="Costo">
                                                                                        <label id="MOCcost" class="text-danger" style="display:none">El campo es requerido.</label>
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
                                                                                    <div class="form-group">
                                                                                        <label for="first-name-vertical"><strong>Descripción</strong></label>
                                                                                        <input type="text" id="OTD" class="form-control" placeholder="Descripción">
                                                                                        <label id="OTDdesc" class="text-danger" style="display:none">El campo es requerido.</label>
                                                                                      </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="contact-info-vertical"><strong>Costo</strong></label>
                                                                                        <input type="number" id="OTC" class="form-control" placeholder="Costo">
                                                                                        <label id="OTCcost" class="text-danger" style="display:none">El campo es requerido.</label>
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
                                                                              <div class="col-12">
                                                                                <div class="form-label-group">
                                                                                  <p for="contact-info-vertical"><strong>Descripción</strong></p>
                                                                                  <textarea class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="Descripción"></textarea>
                                                                                </div>
                                                                              </div>

                                                                              <div class="col-12">
                                                                                <div class="form-label-group">
                                                                                  <p for="contact-info-vertical"><strong>Garantía</strong></p>
                                                                                  <textarea class="form-control" id="garantia" name="garantia" rows="5" placeholder="Garantía"></textarea>
                                                                                </div>
                                                                              </div>

                                                                                <div class="col-md-6 col-12">
                                                                                  <div class="form-label-group">
                                                                                    <p for="contact-info-vertical"><strong>Validez de la propuesta</strong></p>
                                                                                    <input type="text" id="validez" name="validez" class="form-control" placeholder="Validez de la propuesta">
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
          url: "{{url('/filtro_clienteim')}}/" + dato,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            console.log('data => ',data);
            $('#datos').empty();
            data.forEach(element => {
              $('#datos').append("<tr onclick='cliente_seleccionado("+element['id']+")' value='"+element['id']+"' style='cursor: pointer;'><td>"+element['dpi']+"</td><td>"+element['primerNombre']+" "+element['segundoNombre']+"</td><td>"+element['primerApellido']+" "+element['segundoApellido']+"</td></tr>");
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
      $('#search').val('');
      $('#datos').empty();
      $('#NewOldCliente').empty();
      $('#NewOldCliente').append("<input id='NewOldClienteSelect' type='text' class='form-control' name='NewOldClienteSelect' value='CNew'>");
    });

    $("#clienteO-tab").click(function () {
      $('#search').val('');
      $('#datos').empty();
      $('#NewOldCliente').empty();
      $('#NewOldCliente').append("<input id='NewOldClienteSelect' type='text' class='form-control' name='NewOldClienteSelect' value='COld'>");
    });

    $("#vehiculoN-tab").click(function () {
      $('#search2').val('');
      $('#vehiculos').empty();
      $('#NewOldVehiculo').empty();
      $('#NewOldVehiculo').append("<input id='NewOldVehiculoSelect' type='text' class='form-control' name='NewOldVehiculoSelect' value='VNew'>");
    });

    $("#vehiculoO-tab").click(function () {
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
          url: "{{url('/filtro_vehiculoim')}}/" + dato,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            console.log('data => ',data);
            $('#vehiculos').empty();
            data.forEach(element => {
              $('#vehiculos').append("<tr onclick='vehiculo_seleccionado("+element['id']+")' value='"+element['id']+"' style='cursor: pointer;'><td>"+element['placa']+"</td><td>"+element['marca'][0].marca+"</td><td>"+element['modelo'][0].modelo+"</td><td>"+element['tipovehiculo'][0].tipo+"</td><td>"+element['color']+"</td><td>"+element['año']+"</td></tr>");
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
          url: "{{url('/filtroim')}}/" + id,
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
  function cliente_seleccionado (value) {
    $('#select_cliente').empty();
    //$('#select_cliente').append("<input value='"+value+"' id='cliente_id'></input>");
    $('#select_cliente').append("<input value='"+value+"' id='cliente_id' type='text' class='form-control' name='cliente_id' >")
    $('#select_cliente').hide();
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

    if (desc == ''){
      document.getElementById("desc").style.display = "block";
    } else {
      document.getElementById("desc").style.display = "none";
    }

    if (cnt == '' || cnt2 < 1) {
      document.getElementById("cnt").style.display = "block";
    } else {
      document.getElementById("cnt").style.display = "none";
    }

    if (valor == '' || valor2 < 0.0000000000001) {
      document.getElementById("val").style.display = "block";
    } else {
      document.getElementById("val").style.display = "none";
    }

    if (desc == '' || cnt == '' || valor == '' || cnt2 < 1 || valor2 < 0.0000000000000000000001) {
      estado = true;
    }

    if (estado == true) {
      return false
    } else {
      var resultado = (parseInt(cnt) * parseFloat(valor));
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
                var newText3 = document.createTextNode(to_valor);
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
                input3.setAttribute('value', to_valor);
                input3.type = "text";
                input3.hidden =true;
                newCelle.appendChild(input3);

                $("#repuestos tbody tr").each(function(idx, fila) {

                  total += parseFloat(fila.children[3].innerHTML);
                })
                document.getElementById('resultado').textContent = total.toFixed(2);

                var input4 = document.createElement('input');
                input4.name = "TotalEncabezado[]";
                input4.setAttribute('value', resultado);
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

    if (desc == ''){
      document.getElementById("MODdesc").style.display = "block";
    } else {
      document.getElementById("MODdesc").style.display = "none";
    }

    if (valor == '' || valor2 < 0.0000000000001) {
      document.getElementById("MOCcost").style.display = "block";
    } else {
      document.getElementById("MOCcost").style.display = "none";
    }

    if (desc == '' || valor == '' || valor2 < 0.0000000000000000000001) {
      estado = true;
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
                var newText2 = document.createTextNode(valor);
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
                input2.setAttribute('value', valor);
                input2.type = "text";
                input2.hidden =true;
                newCellc.appendChild(input2);

                $("#MOT tbody tr").each(function(idx, fila) {

                  total += parseFloat(fila.children[1].innerHTML);
                })
                document.getElementById('resultadoMO').textContent = total.toFixed(2);

                var input4 = document.createElement('input');
                input4.name = "TotalEncabezado[]";
                input4.setAttribute('value', valor);
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

    if (desc == ''){
      document.getElementById("OTDdesc").style.display = "block";
    } else {
      document.getElementById("OTDdesc").style.display = "none";
    }

    if (valor == '' || valor2 < 0.0000000000001) {
      document.getElementById("OTCcost").style.display = "block";
    } else {
      document.getElementById("OTCcost").style.display = "none";
    }

    if (desc == '' || valor == '' || valor2 < 0.0000000000000000000001) {
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
                var newText2 = document.createTextNode(valor);
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
                input2.setAttribute('value', valor);
                input2.type = "text";
                input2.hidden =true;
                newCelld.appendChild(input2);

                $("#OTT tbody tr").each(function(idx, fila) {

                  total += parseFloat(fila.children[1].innerHTML);
                })
                document.getElementById('resultadoOT').textContent = total.toFixed(2);

                var input4 = document.createElement('input');
                input4.name = "TotalEncabezado[]";
                input4.setAttribute('value', valor);
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
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/forms/wizard-steps.js')) }}"></script>
@endsection
