<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Medida</th>
                  <th>Espesor</th>
                  <th>Peso</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th style="display:none"> </th>
                </tr>
                </thead>
                <tbody id="containerTableProductss" >
              

                @foreach ($productos as $pro)
                 <tr id="">
                 <td style="display:none"> {{$pro->id}}</td>
                <td> {{$pro->nombre}}</td>
                <td> {{$pro->medida}}</td>
                <td> {{$pro->espesor}}</td>
                <td> {{$pro->peso}}</td>
                <td> {{$pro->precio}}</td>
               <td>  {{$pro->cantidad}}</td>
                </tr>
                @endforeach


 

                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
</body>
</html>