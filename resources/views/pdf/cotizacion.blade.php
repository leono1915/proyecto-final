<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <style>
 
 @font-face {
    font-family: SourceSansPro;
    src: url(SourceSansPro-Regular.ttf);
  }
  
  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  
  a {
    color: #0087C3;
    text-decoration: none;
  }
  
  body {
    position: relative;
    width: 21cm;  
    height: 29.7cm; 
    margin: 0 auto; 
    color: #555555;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    font-size: 14px; 
    font-family: SourceSansPro;
  }
  
  header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #AAAAAA;
  }
  
  #logo {
    float: left;
    margin-top: 8px;
  }
  
  #logo img {
    height: 50px;
  }
  
  #company {
    float: left;
    width: 33%;
    text-align: right;
    margin-right: 10px;
    text-align: justify;
  }
  
  
  #details {
    margin-bottom: 10px;
  }
  
  #client {
    padding-left: 6px;
    border-left: 6px solid #0087C3;
    float: left;
  }
  
  #client .to {
    color: #777777;
  }
  
  h2.name {
    font-size: 1.2em;
    font-weight: normal;
    margin: 0;
  }
  
  #invoice {
    margin-top:-55px;
    float: right;
    margin-right:280px;
    text-align:right;
  }
  
  #invoice h1 {
    color: #0087C3;
    font-size: 2.4em;
    line-height: 1em;
    font-weight: normal;
    margin: 0  0 10px 0;
  }
  
  #invoice .date {
    font-size: 1.7em;
    color: #777777;
  }
  
  table {
   
    width:90%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
    margin-right:10px;
  }
  
  table th,
  table td {
    padding: 7px;
    background: #EEEEEE;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;
  }
  
  table th {
    white-space: nowrap;        
    font-weight: normal;
  }
  
  table td {
    text-align: center;
  }
  
  table td h3{
    color: black;
    font-size: 1.2em;
    font-weight: normal;
    margin: 0 0 0.2em 0;
  }
  
  table .no {
    color: black;
    font-size: 1.6em;
    background: #DDDDDD;
  }
  
  table .desc {
    text-align: left;
  }
  
  table .unit {
    background: #DDDDDD;
  }
  
  
  
  table .total {
  
    background:  rgb(197, 79, 11);
    color: #FFFFFF;
  }
  
  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.1em;
  }
  
  table tbody tr:last-child td {
    border: none;
    width:30px;
  }
  
  table tfoot td {
    padding: 8px 16px;
    background: #FFFFFF;
    border-bottom: none;
    font-size: 1.2em;
    white-space: nowrap; 
    border-top: 1px solid #AAAAAA; 
  }
  
  table tfoot tr:first-child td {
    border-top: none; 
  }
  
  table tfoot tr:last-child td {
    color: #57B223;
    font-size: 1.4em;
    border-top: 1px solid #57B223; 
  
  }
  
  table tfoot tr td:first-child {
    border: none;
  }
  
  #thanks{
    font-size: 2em;
    margin-top: -30px;
    margin-bottom: 20px;
  }
  
  #notices{
    max-width:90%;
    padding-left: 6px;
    border-left: 6px solid #0087C3;  
  }
  
  #notices .notice {
    font-size: 1em;
    text-align:justify;
  }
  .subfooter{
    text-align: center;
    text-transform: uppercase;
    margin-bottom: -500px;
    margin-top: 50;
  }
  .division{
    width: 100%;
  }
  footer {
    
    color: #777777;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #AAAAAA;
    padding: 8px 0;
    text-align: center;
    font-size: 21px;
  }
  
  
 </style>
<body>
@php(   $datoDes ='')
  <header class="clearfix">
  <div class="division">
    <div id="company">
    <p style="margin-top:-40px">FOLIO {{$folioFinal}} </p>
    <img src="dist/img/logo.png" alt="BTS">
    </div>
   
    <div id="company">
    <h2 class="name">Matriz</h2>
    <div>Av 8 de Julio #1671, Col Morelos </div>
    <div>Tel 36-19-36-63</div>
    <div><a href="">elhierro@live.com.mx</a></div>
</div>

  <div id="company">
      <h2 class="name">Sucursal</h2>
      <div>Camichines #30, Col Jardines 
    de <br> Sta María</div>
      <div>Tel 38-55-57-83</div>
      <div><a href="">arq.lagos2@gmail.com</a></div>
  </div>
 
  </div>
  <h2 style="text-align:center;  margin-top:30px; margin-right:300px; margin-bottom:-20px;">COTIZACIÓN</h2>
  </header>
  <main>
    <div id="details" class="clearfix">
      <div id="CLIENTE:">
   
        <div class="to">CLIENTE:</div>
        <div class="address"  style="font-weight:bold;">{{$clientes[0]->nombre}}</div>
        <div class="address" style="text-align:justify">{{$clientes[0]->direccion}}</div>
        <div class="address">Tel {{$clientes[0]->telefono}}</div>
        <div class="email"><a href="">{{$clientes[0]->correo}}</a></div>
      </div>
      @php($fecha= date("y-m-d"))
      <div id="invoice">
        <h1>ACEROS 8 DE JULIO</h1>
    <div class=""> <h3>Fecha   {{$fecha}}
        
           </h3> </div>
    
      </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="no">#</th>
          <th class="desc">DESCRIPCIÓN</th>
          <th>      LARGO</th>
          <th> PRECIO KILO</th>
          <th class="unit">PRECIO UNITARIO</th>
          <th class="qty">CANTIDAD</th>
          <th>   KILOS TOTALES</th>
          <th class="total">TOTAL</th>
        </tr>
      </thead>
      <tbody>
      @php($i=1) 
      @php($total=0) 
      @php($subtotal=0) 
      @php($iva=0) 
      @php($descuento=0)
        @foreach($productos as $producto)
       
        <tr> 
          <td class="no">{{$i}}</td>
          <td class="desc">{{$producto->descripcion}}</td>
          <td>       {{$producto->largo}} mts</td>
          <td>       {{$producto->precio_kilo}}</td>
          <td class="unit">{{$producto->precio}}</td>
          <td class="qty">{{$producto->cantidad}}</td>
          <td class="qty">{{$producto->kilos}}</td>
          <td class="total">{{$producto->total}}</td>
          </tr>

          {{$total+=$producto->total}}
          {{$subtotal+=$producto->subtotal}}
          {{$iva+=$producto->iva}}
          {{$i++}}
          @endforeach
          </tbody>
      <table style="width:40%; float:right; margin-right:12%">
        <tr >
          <td colspan="2"></td>
          <td colspan="2">SUBTOTAL</td>
          <td>${{number_format(floatval($subtotal), 2, '.', '')}}</td>
        </tr>
        <tr >
          <td colspan="2"></td>
          <td colspan="2">IVA </td>
          <td>${{number_format(floatval($iva), 2, '.', '')}}</td>
        </tr>$datoDes
        <tr>
          <td colspan="2"></td>
          <td colspan="2">TOTAL</td>
          <td>${{number_format(floatval($total-$descuento), 2, '.', '')}}</td>
        </tr>
      </table>
     
    </table>
    <div id="thanks">Rapidez es nuestro compromiso</div>
    <div id="notices">
      <h2>NOTA!</h2>
      <div class="notice">La cotización solicitada requiere un 50% de anticipo, en caso de envío a domicilio estará sujeta a disponibilidad 
    del vehículo y turno.
    Los tiempos de entrega de placas o cortes serán calculados una vez se haya entregado el anticipo, agradecemos su preferencia.</div>
    </div>
   <div id="notices">
   <h2>Observaciones</h2>
   <div class="notice">
        {{$observaciones}}
    </div>
   </div>
</main>
<h3> Firma o sello de aceptación  </h3> 
</body>

</html>


<!--<table id="example1" class="table table-bordered table-striped">
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
                <td> {{$pro->cantidad}}</td>
                <td> {{$pro->descripcion}}</td>
                <td> {{$pro->precio}}</td>
                <td> {{$pro->subtotal}}</td>
                <td> {{$pro->kilos}}</td>
               <td>  {{1}}</td>
                </tr>
                @endforeach


 

                </tbody>
                <tfoot>
               
                </tfoot>
              </table>

              <table>
              <thead>
                <tr>
                <th>nombre</th>
              <th>medida</th>
              <th>espesor</th></tr>
              </thead>
              <tbody>
              @foreach($clientes as $cli)
                <tr>
                <td>{{$cli->folio}}</td>
                <td>{{$cli->numero}}</td>
                <td>{{$cli->estatus}}</td>
                </tr>
                @endforeach
              
              </tbody>
              </table>-->