@extends('layouts/contentLayoutMaster')

@section('title', 'Eliminar Modelos')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Eliminar Modelo</h4>
                </div>
                <div class="card-body">
                    {{ Form::model($v,['method' => 'DELETE','action' => ["ModeloController@destroy",$id], 'class' => 'form']) }}
                        @csrf

                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>
                          <div class="col-md-6">
                            <input disabled id="marca" type="text" class="form-control" name="marca" value="{{$marca['marca']}}">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Nombre Modelo') }}</label>
                            <div class="col-md-6">
                                <input disabled id="modelo" type="text" class="form-control" name="modelo" value="{{$v['modelo']}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="mx-auto">
                            <a href="{{ url('modelo') }}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
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
