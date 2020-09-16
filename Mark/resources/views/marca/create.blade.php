@extends('layouts/contentLayoutMaster')

@section('title', 'Crear Marcas')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" style="padding: 15px;">{{ __('Registro de Marca') }}</div>

                <div class="card-body">
                    {{ Form::open(['method' => 'post', 'route' => 'marca.store', 'class' => 'form-horizontal']) }}
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Nombre Marca') }}</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{ old('marca') }}">

                                @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ URL::previous() }}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left"></i>     Regresar</a>
                                <button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>
                                    {{ __('Registrar') }}
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
