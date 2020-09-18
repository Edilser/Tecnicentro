@extends('layouts/contentLayoutMaster')

@section('title', 'Modificar Modelos')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" style="padding: 15px;">{{ __('Actualizar Modelo') }}</div>
                <div class="card-body">
                {{ Form::model($v, ['method' => 'PATCH','action' => ["ModeloController@update",$id], 'class' => 'form-horizontal']) }}
                    @csrf

                    <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>
                      <div class="col-md-6">
                        <select required="required" class="form-control" id="marca" name="marca">
                            <option value="{{$marcas['id']}}">{{$marcas['marca']}}</option>
                        </select>
                          @error('marca')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Nombre Modelo') }}</label>
                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="{{$v['modelo']}}">
                                @error('modelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ url('modelo') }}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Regresar</a>
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
        $.ajax({
          url: "{{url('/filtromod')}}",
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            //console.log('data => ',data);
            //marcas
            data.forEach(element => {
              if (element['marca']) {
                  if(element['id'] != $("#id_actual").val()) {
                    //console.log(element['marca']);
                    $('#marca').append("<option value='"+ element['id'] +"'>"+element['marca']+"</option>");
                  }
              }
            });
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
  });
</script>
@endsection
