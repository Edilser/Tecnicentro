@extends('layouts/contentLayoutMaster')

@section('title', 'País')

@section('vendor-style')
    <!-- vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" type="text/css" href={{ asset(mix('/css/plugins/forms/validation/form-validation.css')) }}>
@endsection

@section('content')

    <div class="card-content">
        <div class="card-body">
            <div class="col-md-8 col-12">
                {!! Form::model($pais, ['route' => ['pais.destroy', $id], 'method' => 'delete', 'novalidate', 'class' =>
                'form-horizontal']) !!}

                <div class="card" style="height: 419px;">
                    <div class="card-header">
                        <h4 class="card-title">Eliminar País</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>País</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="pais"
                                                    class="form-control"
                                                    name="pais" placeholder="País"  value="{{ $pais->pais }}"
                                                    readonly  
                                                    >
                                                    <p class="help-block"></p>
                                                
                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        <a href="{{ URL::previous() }}"
                                            class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light" >Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
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
