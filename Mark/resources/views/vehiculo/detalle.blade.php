<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/estilospdf.css')}}">
</head>
<body>
    <header>
        <p><strong>TECNICENTRO GALEANO</strong></p>
    </header>
    <div class="container">
        <h5 class="text-center">REPORTE DE VEHÍCULOS</h5>
        <table class="table table-striped">
            <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">MARCA</th>
                <th scope="col">MODELO</th>
                <th scope="col">TIPO</th>
                <th scope="col">AÑO</th>
            </tr>
            </thead>
            <tbody>
                @foreach($vehiculo as $indice => $vehiculo)
                <tr>
                    <td>{{++$indice}}</td>
                    <td>{{$marcas_total[$indice-1]}} </td>
                    <td>{{$modelos_total[--$indice]}}</td>
                    <td>{{$tipos_total[$indice]}}</td>
                    <td>{{$vehiculo->año}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
