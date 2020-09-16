
@extends('layouts/contentLayoutMaster')

@section('title', 'Modificar Vehículos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" style="padding: 15px;">{{ __('Actualizar Vehículo') }}</div>

                <div class="card-body">
                  {{ Form::model($v,['method' => 'PATCH','action' => ["VehiculoController@update",$id], 'class' => 'form-horizontal']) }}
                    @csrf
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Marca</label>
                        <select class="form-control" id="marca" name="marca">
                          <option name="id_actual" id="id_actual" value="{{$first_marca['id']}}">{{$first_marca['marca']}}</option>
                        </select>

                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Modelo</label>
                        <select class="form-control" id="modelo" name="modelo">
                          <option name="id_actual3" id="id_actual3" value="{{$first_modelo['id']}}">{{$first_modelo['modelo']}}</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo">
                          <option name="id_actual2" id="id_actual2" value="{{$first_tipo['id']}}">{{$first_tipo['tipo']}}</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Año</label>
                        <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{$v['año']}}">
                          @error('year')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{url('vehiculo')}}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left"></i>     Regresar</a>
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
<script>
  $(document).ready(function(e){
        $.ajax({
          url: "{{url('/total_select')}}/",
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
              } else if (element['tipo']) {
                  if(element['id'] != $("#id_actual2").val()) {
                    //console.log(element['tipo']);
                    $('#tipo').append("<option value='"+ element['id'] +"'>"+element['tipo']+"</option>");
                  }
              }
            });
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });

        var id = $("#marca").val();
        $.ajax({
          url: "{{url('/filtro')}}/" + id,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            //console.log('data => ',data);
            data.forEach(element => {
              if (element['modelo']) {
                  if(element['id'] != $("#id_actual3").val()) {
                    //console.log(element['modelo']);
                    $('#modelo').append("<option value='"+ element['id'] +"'>"+element['modelo']+"</option>");
                  }
              }
            });
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });

      $("#marca").change(function(){
      var id = $("#marca").val();
      if(id){
        $.ajax({
          url: "{{url('/filtro')}}/" + id,
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            //console.log('data => ',data);
            $('#modelo').empty();
            data.forEach(element => {
              $('#modelo').append("<option value='"+ element['id'] +"'>"+element['modelo']+"</option>");
            });
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      } else {
        $('#modelo').empty();
      }

    })
  });
</script>
@endsection
