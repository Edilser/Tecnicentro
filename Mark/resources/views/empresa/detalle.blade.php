<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{asset('css/estilospdf.css')}}">
</head>
<body>
    <header>
        <p><strong>TECNICENTRO GALEANO</strong></p>
    </header>
    <div class="container">
        <h5 class="text-center">REPORTE DE EMPRESAS</h5>
        <table class="table table-striped">
            <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">DIRECCIÓN</th>
            </tr>
            </thead>
            <tbody>
                foreach($empresa as $indice => $empresa)
                <tr>
                    <td>{++$indice}}</td>
                    <td>{$empresa->empresa}} </td>
                    <td>{$empresa->idDireccion}}</td>
                </tr>
                endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
-->

<table>
  <thead >
  <tr>
      <th>#</th>
      <th>NOMBRE</th>
      <th>DIRECCIÓN</th>
  </tr>
  </thead>
  <tbody>
      @foreach($empresa as $indice => $empresa)
      <tr>
          <td>{{++$indice}}</td>
          <td>{{$empresa->empresa}} </td>
          <td>{{$empresa->idDireccion}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
