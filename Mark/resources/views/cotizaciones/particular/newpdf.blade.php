@extends('layouts/contentLayoutMasterPDF')

@section('title', 'Cotización')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/invoice.css')) }}">
@endsection
@section('content')

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
              <!--<div class="recipient-contact pb-2">
                      <p>
                          <i class="feather icon-mail"></i>
                          peter@mail.com
                      </p>
                      <p>
                          <i class="feather icon-phone"></i>
                          +91 988 888 8888
                      </p>
              </div>-->
          </div>
          <div class="col-sm-6 col-12 text-right">
            <div class="company-contact mb-2">
              <h5>Datos del Técnico</h5>
              <p><strong>Walter Galeano</strong></p>
                    <p>
                        <i class="feather icon-mail"></i>
                        tecnicentro.galeano@hotmail.com
                    </p>
                    <p>
                        <i class="feather icon-phone"></i>
                        55168003 / 41000533
                    </p>
            </div>
              <h5>Datos del Cliente</h5>
              <div class="company-info my-2">
                      <p><strong>Cliente </strong>{{$cotizacion->clientevehiculo->clientes->primerNombre . " " . $cotizacion->clientevehiculo->clientes->primerApellido}}</p>
                      <p><strong>Teléfono </strong>{{'35648575'}}</p>
              </div>
          </div>
      </div>
      <!--/ Invoice Recipient Details -->

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
    <!-- Invoice Items Details OT -->
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
                  @foreach ($cotizacion->detalle as $detalle)
                        @if ($detalle->tipo == 'OT')
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
  <!--OT-->
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
                          <tr>
                              <th>TOTAL OTROS TRABAJOS</th>
                              <td>{{$tot_O}}</td>
                          </tr>
                          <tr class="text-danger">
                            <th><strong>TOTAL A PAGAR</strong></th>
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
          <h4 class="text-danger text-center"><strong>Notas</strong></h4>
          @foreach ($cotizacion->detalle as $detalle)
              @if ($detalle == 'NOTAS')
                <p class="text-justify">{{$detalle->descripcion}}</p>
              @endif
          @endforeach
        </div>
      </div>
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
