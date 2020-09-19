
@extends('layouts/contentLayoutMaster')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection
@section('page-style')
<!-- Page css files -->
<link rel="stylesheet" type="text/css" href={{ asset(mix('/css/plugins/forms/validation/form-validation.css')) }}>
@endsection

@section('title', 'Vehículos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Registro de Vehículo</h4>
                </div>
                <div class="card-body">
                  {{ Form::open(['method' => 'post', 'novalidate', 'route' => 'vehiculo.store', 'class' => 'form-horizontal']) }}
                    @csrf
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Marca</label>
                        <select required="required" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca">
                          <option value="-1">Seleccione una marca</option>
                          @foreach ($marcas as $marca)
                            <option value="{{$marca->id}}">{{$marca->marca}}</option>
                          @endforeach
                        </select>
                        @error('marca')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Modelo</label>
                        <select required="required" class="form-control" id="det" name="det">
                        </select>
                        @error('det')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Tipo</label>
                        <select required="required" class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                          <option value="-1">Seleccione el tipo de vehículo</option>
                          @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                          @endforeach
                        </select>
                        @error('tipo')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Año</label>
                        <input id="year" type="number" class="form-control" name="year" value="{{ old('year') }}" required data-validation-required-message='{{ __('validation.required') }}' data-validation-regex-regex="^(19[6-8][0-9]|199[0-9]|20[01][0-9]|202[0-2])$" data-validation-regex-message=' {{ __('validation.YearMessage') }} '>
                        <p class="help-block"></p>
                      </div>
                      <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{url('vehiculo')}}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>

                        </div>
                    </div>

                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function(e){
    $("#marca").change(function(){
      var id = $("#marca").val();
      if(id){
        $.ajax({
          url: "{{url('/filtro')}}/" + id,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            console.log('data => ',data);
            $('#det').empty();
            //var tbody = $('#det').children('tbody');
            //var table = $('#det');
            data.forEach(element => {
              $('#det').append("<option value='"+ element['id'] +"'>"+element['modelo']+"</option>");
            });
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      } else {
        $('#det').empty();
      }

    })
  });
</script>
@endsection
@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset(mix('/vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
@endsection
@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
@endsection