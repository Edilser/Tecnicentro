@extends('layouts/contentLayoutMaster')

@section('title', 'Eliminar Tipo Vehículo')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" style="padding: 15px;">{{ __('Eliminar Tipo Vehículo') }}</div>
                <div class="card-body">
                    {{ Form::model($v,['method' => 'DELETE','action' => ["TipoVehiculoController@destroy",$id], 'class' => 'form']) }}
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Tipo Vehículo') }}</label>

                            <div class="col-md-6">
                                <input disabled id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{$v['tipo']}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="mx-auto">
                                <a href="{{ URL::previous() }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left"></i>     Regresar</a>
                                <button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>
                                    {{ __('Eliminar') }}
                                </button>

                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
