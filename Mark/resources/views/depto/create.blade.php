@extends('layouts/contentLayoutMaster')

@section('title', 'Departamento')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" type="text/css" href={{ asset(mix('/css/plugins/forms/validation/form-validation.css')) }}>
@endsection

@section('content')

    <div class="card-content">
        <div class="card-body">
            <div class="col-md-8 col-12">
                {!! Form::open(['route' => 'depto.store', 'method' => 'post', 'novalidate', 'class' => 'form-horizontal'])
                !!}

                <div class="card" style="height: 419px;">
                    <div class="card-header">
                        <h4 class="card-title">Nuevo Departamento</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>Pais</span>
                                            </div>
                                            <div class="col-md-8">
                                            <select required="required" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais">
                                              <option></option>
                                              @foreach ($pais as $p)
                                                <option value="{{$p->id}}">{{$p->pais}}</option>
                                              @endforeach
                                            </select>
                                            </div>
                                            @error('pais')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                              @enderror
                                          </div>

                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>Departamento</span>
                                            </div>
                                            <div class="col-md-8">
                                            
                                                <input type="text" id="depto"
                                                    class="form-control"
                                                    name="depto" placeholder="Departamento"
                                                    required 
                                                    data-validation-required-message='{{ __('validation.required') }}'
                                                    data-validation-regex-regex="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$" 
                                                    data-validation-regex-message=' {{ __('validation.LettersWhiteSpaces') }} '   
                                                    >
                                                    <p class="help-block"></p> 
                                            </div>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        <a href="{{ URL::previous() }}"
                                            class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

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
