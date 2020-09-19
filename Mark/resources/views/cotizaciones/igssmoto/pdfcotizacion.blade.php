@extends('layouts/contentLayoutMaster')

@section('title', 'Cotización')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/invoice.css')) }}">
@endsection
@section('content')
<!-- invoice functionality start-->
<section class="invoice-print mb-1">
    <div class="row">
      <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
        <div class="input-group">
          <!--<input type="text" class="form-control" placeholder="Email" aria-describedby="button-addon2">
          <div class="input-group-append" id="button-addon2">
            <button class="btn btn-outline-primary" type="button">Send Invoice</button>
          </div>-->
        </div>
      </fieldset>
      <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
        <a href="{{url('/cotizacion-vehiculo')}}" class="btn btn-outline-danger  mr-1 ml-md-1"> <i class="feather icon-arrow-left"></i>Regresar</a>
        <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Imprimir</button>
        <button class="btn btn-outline-primary  ml-0 ml-md-1"> <i class="feather icon-download"></i> Descargar</button>
      </div>
    </div>
  </section>

  <!-- invoice functionality end -->
<section class="card invoice-page">
  <div id="invoice-template" class="card-body">
      <!-- Invoice Company Details -->
      <div id="invoice-company-details" class="row">
        <div class="col-md-0 col-sm-12 text-center">
          <h1>TECNICENTRO GALEANO</h1>
        </div>
          <div class="col-md-6 col-sm-12 text-left pt-1">
              <div class="media pt-1">
                  {{-- <img src="{{ asset('images/logo/logo.png') }}" alt="company logo" class=""/> --}}
              </div>
          </div>
          <div class="col-md-6 col-sm-12 text-right">

              <h1>Cotización</h1>
              <div class="invoice-details mt-2">
                  <h5>Fecha</h5>
                  <p>{{\Carbon\Carbon::parse($cotizacion->fecha)->format('d-m-Y')}}</p>
                  <!--<h6 class="mt-2">INVOICE DATE</h6>
                  <p>10 Dec 2018</p>-->
              </div>
          </div>
      </div>
      <!--/ Invoice Company Details -->

      <!-- Invoice Recipient Details -->
      <div id="invoice-customer-details" class="row pt-2">
          <div class="col-sm-6 col-12 text-left">
            @foreach ($cotizacion->detalle as $detalle)
              @if ($detalle->tipo == 'NOG')
                <h5>{{'NOG/EVENTO'}}</h5>
                <P>{{$detalle->descripcion}}</P>
              @endif
            @endforeach
              <h5>Regimen</h5>
              <p>Sujeto a Retencion Definitiva</p>
              <h5>NO. De cuenta B.I</h5>
              <p> A Nombre de Walter Galeano. 014-062794-3</p>
              <h5>Validez de la propuesta</h5>
              @foreach ($cotizacion->detalle as $detalle)
                @if ($detalle->tipo == 'VALIDEZ')
                  <p>{{$detalle->descripcion}}</p>
                @endif
              @endforeach
              <h5>Datos del Vehículo</h5>
              <div class="recipient-info my-2">
                      <p><strong>Vehículo </strong>{{$cotizacion->clientevehiculo->vehiculos->marca[0]->marca . ' ' . $cotizacion->clientevehiculo->vehiculos->modelo[0]->modelo}}</p>
                      <p><strong>Placa </strong>{{$cotizacion->clientevehiculo->vehiculos->placa}}</p>
                      <p><strong>Chasis </strong>{{$cotizacion->clientevehiculo->vehiculos->chasis}}</p>
                      <p><strong>Motor </strong>{{$cotizacion->clientevehiculo->vehiculos->motor}}</p>
                      <p><strong>Modelo </strong>{{$cotizacion->clientevehiculo->vehiculos->año}}</p>
                      <p><strong>Color </strong>{{$cotizacion->clientevehiculo->vehiculos->color}}</p>
                      @foreach ($cotizacion->detalle as $detalle)
                          @if ($detalle->tipo == 'KMI')
                            <p><strong>KMS Ingreso </strong>{{number_format($detalle->valor,0,'.',',')}}</p>
                          @elseif ($detalle->tipo == 'KMN')
                            <p><strong>KMS Próximo Servicio </strong>{{number_format($detalle->valor,0,'.',',')}}</p>
                          @endif
                      @endforeach
              </div>
          </div>
          <div class="col-sm-6 col-12 text-right">
            <div class="company-contact mb-2">
              <h5>Datos del Técnico</h5>
              <p><strong>Walter Galeano</strong></p>
                    <p>
                      <i class="feather icon-link-2"></i>
                        1645747-1
                    </p>
                    <p>
                        <i class="feather icon-mail"></i>
                        tecnicentro.galeano@hotmail.com
                    </p>
                    <p>
                        <i class="feather icon-phone"></i>
                        55168003 / 41000533
                    </p>
                    <p>
                      <i class="feather icon-map-pin"></i>
                      8 calle 32-76 zona 4 de mixco.
                    </p>
            </div>
              <h5>Datos del Cliente</h5>
              <div class="company-info my-2">
                      <p><strong>Cliente </strong>{{$cotizacion->clientevehiculo->clientes->primerNombre . " " . $cotizacion->clientevehiculo->clientes->primerApellido}}</p>
                      <p><strong>Teléfono </strong>{{'35648575'}}</p>
                      <p><strong>Dirección</strong></p>
              </div>
          </div>
      </div>
      <!--/ Invoice Recipient Details -->
      <div class="container w-100">
        <div class="row w-100 border">
          @foreach ($cotizacion->detalle as $detalle)
            @if ($detalle->tipo == 'DESCRIPCION')
              <div class="col w-100">
                <h4 class="text-danger text-center"><strong>Descripción</strong></h4>
                <p class="text-justify">{{$detalle->descripcion}}</p>
              </div>
            @endif
          @endforeach
        </div>
      </div>
      <!-- Invoice Items Details -->
      <div id="invoice-items-details" class="pt-1 invoice-items-table">
          <div class="row">
              <div class="table-responsive col-sm-12">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th columnspan="2">REPUESTOS DE REPARACIÓN</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <th>DESCRIPCIÓN</th>
                        <th>CANTIDAD</th>
                        <th>VALOR</th>
                        <th>TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cotizacion->detalle as $detalle)
                        @if ($detalle->tipo == 'REPUESTO')
                          <tr>
                            <td>{{$detalle->descripcion}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->valor}}</td>
                            <td>{{number_format($detalle->cantidad*$detalle->valor, 2, '.', ',')}}</td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
      <!-- Invoice Items Details MO -->
      <div id="invoice-items-details" class="pt-1 invoice-items-table">
        <div class="row">
            <div class="table-responsive col-sm-12">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>MANO DE OBRA</th>
                      <th></th>
                    </tr>
                    <tr>
                      <th>DESCRIPCIÓN</th>
                      <th>TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cotizacion->detalle as $detalle)
                        @if ($detalle->tipo == 'MO')
                          <tr>
                            <td>{{$detalle->descripcion}}</td>
                            <td>{{$detalle->valor}}</td>
                          </tr>
                        @endif
                      @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--MO fin-->
    <!-- Invoice Items Details OT
    <div id="invoice-items-details" class="pt-1 invoice-items-table">
      <div class="row">
          <div class="table-responsive col-sm-12">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>OTROS TRABAJOS</th>
                    <th></th>
                  </tr>
                  <tr>
                    <th>DESCRIPCIÓN</th>
                    <th>TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  foreach ($cotizacion->detalle as $detalle)
                        if ($detalle->tipo == 'OT')
                          <tr>
                            <td>{$detalle->descripcion}}</td>
                            <td>{$detalle->valor}}</td>
                          </tr>
                        endif
                  endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>
-->
      <!--Notas-->

<br>
    <div class="d-flex">
      <div class="w-100">
        <div id="invoice-total-details" class="invoice-total-table">
          <div class="row">
              <div class="col-12">
                  <div class="table-responsive">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th>RESUMEN</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <th>TOTAL REPUESTOS</th>
                              <td>{{$tot_R}}</td>
                          </tr>
                          <tr>
                              <th>TOTAL MANO DE OBRA</th>
                              <td>{{$tot_M}}</td>
                          </tr>
                          <tr class="text-danger">
                            <th><strong>TOTAL DE LA REPARACIÓN</strong></th>
                            <td>{{$total}}</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <div class="w-100 ml-5">
        <div class="">
          <h4 class="text-danger text-center"><strong>Observaciones</strong></h4>
          @foreach ($cotizacion->detalle as $detalle)
              @if ($detalle->tipo == 'GARANTIA')
                <p class="text-justify">{{$detalle->descripcion}}</p>
              @endif
          @endforeach
        </div>
      </div>
    </div>
    <div class="d-flex flex-row">
      <div class="p-2"><h5 class="text-danger">Total en letras</h5></div>
      <div class="p-2"><strong>{{$salida_letras}}</strong></div>
    </div>

      <!-- Invoice Footer -->
      <div id="invoice-footer" class="text-right pt-3">
          <!--<p>Transfer the amounts to the business amount below. Please include invoice number on your check.
          <p class="bank-details mb-0">
              <span class="mr-4">BANK: <strong>FTSBUS33</strong></span>
              <span>IBAN: <strong>G882-1111-2222-3333</strong></span>
          </p>-->
          <h5 class="text-center"><strong>"El éxito consiste en hacer cosas ordinarias de manera extraordinaria"</strong></h5>
      </div>
      <!--/ Invoice Footer -->
  </div>
</section>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/pages/invoice.js')) }}"></script>
@endsection
