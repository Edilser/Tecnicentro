@extends('layouts/contentLayoutMaster')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection
@section('page-style')
<!-- Page css files -->
<link rel="stylesheet" type="text/css" href={{ asset(mix('/css/plugins/forms/validation/form-validation.css')) }}>
@endsection

@section('title', 'Modificar Empresas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" style="padding: 15px;">{{ __('Actualizar Empresa') }}</div>
                <div class="card-body">
                {{ Form::model($v,['method' => 'PATCH','action' => ["EmpresaController@update",$id], 'novalidate', 'class' => 'form-horizontal']) }}
                    @csrf
                    <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Nombre Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="empresa" type="text" class="form-control" name="empresa" value="{{$v['empresa']}}" required data-validation-required-message='{{ __('validation.required') }}'>
                                <p class="help-block"></p>
                              </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="idDireccion" type="text" class="form-control" name="idDireccion" value="{{$v['idDireccion']}}" required data-validation-required-message='{{ __('validation.required') }}'>
                                <p class="help-block"></p>
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

@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset(mix('/vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
@endsection
@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
@endsection