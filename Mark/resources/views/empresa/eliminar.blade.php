@extends('layouts/contentLayoutMaster')

@section('title', 'Eliminar Empresas')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">Eliminar Empresa</h4>
                </div>
                <div class="card-body">
                    {{ Form::model($v,['method' => 'DELETE','action' => ["EmpresaController@destroy",$id], 'class' => 'form']) }}
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Nombre Empresa') }}</label>

                            <div class="col-md-6">
                                <input type="text" readonly id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{$v['empresa']}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input type="text" readonly id="idDireccion" type="text" class="form-control @error('idDireccion') is-invalid @enderror" name="idDireccion" value="{{$v['idDireccion']}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="mx-auto">
                                <a href="{{ url('empresa')}}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Eliminar</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
