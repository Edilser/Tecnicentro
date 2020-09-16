@extends('layouts/contentLayoutMaster')

@section('title', 'Modificar Empresas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" style="padding: 15px;">{{ __('Actualizar Empresa') }}</div>
                <div class="card-body">
                {{ Form::model($v,['method' => 'PATCH','action' => ["EmpresaController@update",$id], 'class' => 'form-horizontal']) }}
                    @csrf
                    <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Nombre Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{$v['empresa']}}">
                                @error('empresa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="idDireccion" type="text" class="form-control @error('idDireccion') is-invalid @enderror" name="idDireccion" value="{{$v['idDireccion']}}">
                                @error('idDireccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ url('empresa')}}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left"></i>     Regresar</a>
                                <button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>
                                    {{ __('Actualizar') }}
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
