
@extends('layouts/contentLayoutMaster')

@section('title', 'Eliminar Vehículos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" style="padding: 15px;">{{ __('Eliminar Vehículo') }}</div>

                <div class="card-body">
                  {{ Form::model($v,['method' => 'DELETE','action' => ["VehiculoController@destroy",$id], 'class' => 'form']) }}
                    @csrf
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Marca</label>
                        <input disabled id="año" class="form-control" name="año" value="{{$marcas['marca']}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Modelo</label>
                        <input disabled id="año" class="form-control" name="año" value="{{$modelos['modelo']}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Tipo</label>
                        <input disabled id="año" class="form-control" name="año" value="{{$tipos['tipo']}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Año</label>
                        <input disabled id="año" class="form-control" name="año" value="{{$v['año']}}">

                      </div>
                      <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{url('vehiculo')}}" class="btn btn-danger"><i class="far fa-arrow-alt-circle-left"></i>     Regresar</a>
                            <button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>
                                {{ __('Eliminar') }}
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
    $("#marca").change(function(){
      var id = $("#marca").val();
      if(id){
        $.ajax({
          url: "{{url('create/filtro')}}/" + id,
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
