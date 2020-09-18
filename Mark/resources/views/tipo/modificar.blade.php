@extends('layouts/contentLayoutMaster')

@section('title', 'Modificar Tipo Vehículo')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" style="padding: 15px;">{{ __('Actualizar Tipo Vehículo') }}</div>
                <div class="card-body">
                {{ Form::model($v,['method' => 'PATCH','action' => ["TipoVehiculoController@update",$id], 'class' => 'form-horizontal']) }}
                    @csrf
                    <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Vehículo') }}</label>

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{$v['tipo']}}">
                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ url('tipoVehiculo') }}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>

                            </div>
                        </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
