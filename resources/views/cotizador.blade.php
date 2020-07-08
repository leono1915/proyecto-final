

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizador</title>
    <style>
     .fa-eraser{
       width:50px;
     }
    </style>
   <!-- <link rel="stylesheet" href="{{asset('dist/css/main.css')}}" />-->
   <link rel="stylesheet" href="{{asset('dist/css/aside.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
   function cerrar(){
     document.getElementById('modalObservaciones').value='';
   }
	function mensaje2() {

		var ar=mensaje();
	   console.log(ar[0]);	
	}
	function mensaje(){
		var nombrey=document.getElementById('selectionNameCliente').selectedIndex;
	var nombrex=document.getElementById('selectionNameCliente').options;
	var nombreCliente=nombrex[nombrey].text;
	var descuento=parseFloat(document.getElementById('descuento').innerHTML);


	//window.open('imprimir.php' + "?nombreCliente=" +nombreCliente,"_blank");
	//window.open("imprimir.php?nombreCliente=&descuento=descuento "); 
	window.open("imprimir.php?nombreCliente=" + nombreCliente + "&descuento="+ descuento +""); 

	
	}
	
		</script>
	<style>
    .contenidoRadio{
      margin:auto;
      float:right;
      padding:10px;
     
    }
    .contenidoRadio input{
      margin-left:30px;
    }
  </style>
	</head>
	<body class="hold-transition sidebar-mini  layout-footer-fixed ">
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
     
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @extends('layouts.aside')

   
  <div class="content-wrapper" >
<!-- Button trigger modal -->


<!-- Modal Placas-->
<div class="modal fade" id="cotizarPlacas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"

>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-lg" >
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">Placas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  >
        <div class="container" >
        <div class="cotizador-placas" id="cotizador-placas">
											
											<div class="row">
										
													<div class="col-md-6" id="placeholder">	
                                            <select name="" id="selectionNamePlaca" class="form-control">
												
																
												<option >Placa</option>
												<option >Disco</option>
												<option >Brida</option>
												<option >Cartabon</option>
											 
											</select>
											
											<input type="text" id="medidaBrida"class="form-control mt-3" placeholder="Diametro Interior" >
											</div>
											   <div class="col-md-6" id="placeholder">
												<input class="form-control " type="text" id="medida1"  placeholder="Medida 1">
												<input class="form-control mt-3" type="text" id="medida2"  placeholder="Medida 2">
											</div>
												<div class="col-md-6" id="placeholder">
												<input class="form-control mt-3" type="text" id="precio" placeholder="Precio">
											
                      </div>
                      <div class="col-md-6">
                      <input class="form-control mt-3" type="text" id="precioCorte"  placeholder="Corte">
                      </div>
											</div>
										
											
											<div class="row">
											<label for="pulgadas"><input type="checkbox" class="form-check-label" id="pulgadas" value="2.54">Pulgadas</label>
                                        <div class="espesores">
																<div class="contenidoRadio col-md-12">
																<label class="label-radio item-content">
																		<input type="radio" class="form-check-label"name="gender" id="1/8" value=".0025"> 
																		<span class="spana">1/8</span>
																	</label>
																	<label class="label-radio item-content">
																		<input type="radio" class="form-check-label" name="gender" id="3/16" value=".00375">
																		<span class="spana">3/16</span>
																	</label>
																	<label class="label-radio item-content">
																		<input type="radio" class="form-check-label" name="gender" id="1/4" value=".0050">
																		<span class="spana">1/4</span> 
																	</label>
																	<label class="label-radio item-content">
																		<input type="radio" name="gender" id="5/16" value=".00625"/> 
																		<span class="spana">5/16</span>
																	</label>
																	<label class="label-radio item-content">
																		<input type="radio" name="gender" id="3/8" value=".0075">
																		<span class="spana">3/8</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="7/16" value=".00875">
																		<span class="spana">7/16</span>
																		</label>
																		
																		
																</div>
																<div class="contenidoRadio col-md-12">
																<label class="label-radio item-content">
																<input type="radio" name="gender" id="1/2" value=".0100">
																		<span class="spana">1/2</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="5/8" value=".0125">
																		<span class="spana">5/8</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="3/4" value=".0150">
																		<span class="spana">3/4</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="7/8" value=".0175">
																		<span class="spana">7/8</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="1" value=".0200">
																		<span class="spana">1</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="13/16" value=".02375">
																		<span class="spana">1 3/16</span>
																		</label>
																</div>
																<div class="contenidoRadio col-md-12">
																<label class="label-radio item-content">
																<input type="radio" name="gender" id="11/4" value=".0250">
																		<span class="spana">1 1/4</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="13/8" value=".0275">
																		<span class="spana">1 3/8</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="11/2" value=".0300">
																		<span class="spana">1 1/2</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="15/8" value=".0325">
																		<span class="spana">1 5/8</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="13/4" value=".0350">
																		<span class="spana">1 3/4</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="2" value=".0400">
																		<span class="spana">2</span>
																		</label>
																	
																</div>
																<div class="contenidoRadio col-md-12">
																<label class="label-radio item-content">
																<input type="radio" name="gender" id="21/4" value=".0450">
																		<span class="spana">2 1/4</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="21/2" value=".0500">
																		<span class="spana">2 1/2</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="3" value=".0600">
																		<span class="spana">3</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="4" value=".0800">
																		<span class="spana">4</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="5" value=".100">
																		<span class="spana">5</span>
																		</label>
																		<label class="label-radio item-content">
																		<input type="radio" name="gender" id="6" value=".120">
																		<span class="spana">6</span>
																		</label>
																		
																</div>

													

															
														
													

										</div>
										<div class="informacion-placas col-md-12" >
											
											<label for="">Peso</label>
											<input class="form-control"type="text" id="txtPesoPlaca" value="">
											<label for="">Corte</label>
											<input class="form-control"type="text" id="txtCortePlaca" value="">
											<label for="">SubTotal</label>
											<input class="form-control"type="text" id="txtSubTotalPlaca" value="">
											<label for="">Iva</label>
											<input class="form-control"type="text" id="txtIvaPlaca" value="">
											<label for="">Total</label>
											<input class="form-control"type="text" id="txtTotalPlaca" value="">
										 
										</div>
										</div>
										<br>
									

                    </div>
                    

                    <!--end   of cotizador Placas-->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="cotizarPlaca">Cotizar</button>
      </div>
    </div>
  </div> 
</div>
 <!--  End Modal Placas-->
 <!-- Modal Agregar Concepto-->
 <div class="modal fade" id="conceptoNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Concepto Nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h2>Agregue el nuevo concepto</h2>
												<div class="popup">
										
					  Cantidad<input class="form-control" type="text" value="1" id="cantidadConcepto">
					  Nombre<input class="form-control" type="text" id="nombreConcepto">
					  Medida<input class="form-control" type="text" id="medidaConcepto">
					  Espesor<input class="form-control" type="text" id="espesorConcepto">
             Precio<input class="form-control" type="text" id="precioConcepto">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="agregarConcepto">Agregar</button>
      </div>
    </div>
  </div>
</div>
 <!--  End agregar Concepto-->
<!--   Modal agregar  Cliente   -->
 <div class="modal fade" id="clienteNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Concepto Nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h2>Agregue el nuevo cliente</h2>
												<div class="popup">
										
					  Nombre<input class="form-control" type="text" value="1" id="nombreClienteModal">
					  Telefono<input class="form-control" type="text" id="telefonoCliente">
            Celular<input class="form-control" type="text" id="celularCliente">
					  Correo<input class="form-control" type="text" id="correoCliente">
					  Domicilio<input class="form-control" type="text" id="domicilioCliente">
           
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
                <!--   End agregar cliente desde cotizador  -->

                <!--   Modal vender  -->
 <div class="modal fade" id="opcionVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Venta concretada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h2>Llene todas las casillas</h2>
												<div class="popup">
										<select class="form-control mt-2" name="" id="facturado">
                    <option value="facturado">FACTURADO</option>
                      <option value="si">SI</option>
                      <option value="no">NO</option>
                      
                    </select>
                    <select class="form-control mt-2"  name="" id="pago">
                    <option value="pago">MÉTODO DE PAGO</option>
                      <option value="efectivo">EFECTIVO</option>
                      <option value="tarjeta">TARJETA</option>
                      <option value="transferencia">TRANFERENCIA</option>
                    </select>
                    <select class="form-control mt-2" name="" id="inventario">
                    <option value="inventario">INVENTARIO</option>
                      <option value="a">SERIE A</option>
                      <option value="b">SERIE B</option>
                    </select>
                    <select class="form-control mt-2" name="" id="credito">
                    <option value="credito">CREDITO</option>
                      <option value="si">SI</option>
                      <option value="no">NO</option>
                    </select>
					  
           
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id='venta'>Crear venta</button>
      </div>
    </div>
  </div>
</div>

        <!-- Modal Agregar observaciones-->
 <div class="modal fade" id="observaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Observaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h2></h2>
												<div class="popup">
										
					  <textarea class="form-control" type="textarea" value="" rows='5' id="modalObservaciones"> </textarea>
					 
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick='cerrar();' data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
      </div>
    </div>
  </div>
</div>
 <!--  End agregar observaciones-->
      <div class="container">
        
      <form  >
     
  <div class="form-row">

 
    <div class="col-md-6 mt-3 mb-4">   <button type="button"class="btn btn-success" data-toggle="modal" data-target="#conceptoNuevo" >
      Agregar Concepto</button></div>
    <div class="col-md-6 mt-3 mb-4">  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cotizarPlacas">
 Cotizar Placas
</button></div>
   

    <div class="col-md-3 mb-3 " >
     
      <input type="text" class="form-control" id="nombreInput" value="" required placeholder="Buscar" onchange="listarClientes();" >
    </div>
    <div class="col-md-6 mb-3">
     
     
      <select class="form-control" id="nombreCliente" >
            
    
    </select>

    <select style='display:none' id="telefono">
    
    </select>
    <select style='display:none' id="correo">
    
    </select>
    </div>
    <div class="col-md-3 mb-3 " >
     
     <input type="text" class="form-control" id="ic" value=""  placeholder="I.C">
   </div>
    <div class="col-md-4 mb-3">
      <label for="nombre">Nombre</label>
      <select class="form-control" id="nombre" onchange="selectMedida()">
      <option>Nombre</option>
   
    </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="medida">Medida</label>
      

      <select class="form-control" id="medida" onchange="selectEspesor()">
     
    </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="espesor">Espesor</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="espesori">1/1</span>
        </div>
        <select class="form-control" id="espesor">
     
    </select>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
    <label for="peso">Tramos</label>
     <div class="input-group">
       <div class="input-group-prepend">
      
         <span class="input-group-text" id="pesos">PZA</span>  
       </div>
       <input type="number" class="form-control" id="tramos" aria-describedby="inputGroupPrepend2" value="1"  min="0">
     </div>
     
    </div>
    <div class="col-md-4 mb-3">
      <label for="medida">Metros</label>
      <input type="number" class="form-control" id="metros" value="0"  min="0">
    </div>

   
    
    <div class="col-md-6 mt-3 mb-4">  
    
     <button class="btn btn-dark" id="cotizacion">Generar Cotización</button></div>
    <div class="col-md-6 mt-3 mb-4">   <a href='javascript:void(0);'class="btn btn-dark"  data-toggle='modal'
     data-target='#opcionVenta'>Vender</a>

     <button type="button" class="btn btn-dark" style="margin-left:35%" data-toggle="modal" data-target="#clienteNuevo">
 Agregar Cliente
</button>
    
    </div>
   
   
  </div>
  
 
    <!--<div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>-->
    <input type="checkbox" name="opcionImprimir" id="opcionImprimir" > S/I
   
    <input type="checkbox" style="margin-left:20px" name="pulgadas" id="pulgada" > P
</form>
<div class="col-md-6 mt-3 mb-4">   <button class="btn btn-danger" id="click">Calcular</button>

<button class="btn btn-danger" id="limpiarTabla">limpiar Tabla</button>
<button class="btn btn-danger"  data-toggle='modal'
     data-target='#observaciones'>Observaciones</button>
</div>

      </div>

      <div  class="card-header text-center container">
       <table class="table ">
      <thead>
      <tr>
      <th> Cantidad</th>
      <th>Unidad</th>
       <th>Descripción</th>
      <th> Largo </th>
       <th>Precio kilo</th>
       <th>Cant KG</th>
       <th>Precio Unitario</th>
       <th>Importe</th>
       <th>Accion </th>
      </tr>
      </thead>
       <tbody  id='contenedorTablaCotizacion1'>
       
       
       </tbody>
       <tfoot >
                      
													<tr>
                          
														<td colspan="6"></td>
														<td style="font-weight: bold">Descuento
															<select name="" id="opcionAdescontar">
														 <option value="0"> 0%</option>
														 <option value=".08"> 8%</option>
														 <option value=".07"> 7%</option>
														  <option value=".06"> 6%</option>
														   <option value=".05"> 5%</option>
														   <option value=".04"> 4%</option>
														 <option value=".03"> 3%</option>
														 <option value=".02"> 2%</option>
														  <option value=".01"> 1%</option>
														
														 </select>
														</td>
														
														<td id="descuento">0.00</td>
														<td><i class="fas fa-tags" id="descuentos"></i>
														<i class="fas fa-window-close" id="limpiarDescuento"></i></td>
													</tr>

                          <tr>
                        <td colspan="6"></td>
                        <th>Subtotal</th>
       <th>Iva</th>
       <th>Total</th>
                       </tr>
													<tr>
														<td colspan="6"></td>
														
														<td style=" display:none"id="total_precio">0.00</td>
														<td id="total_subtotales">0.00</td>
														<td id="total_impuesto">0.00</td>
														<td id="total_total">0.00</td>
													   
														</td>	
													</tr>
												</tfoot>
       </table>
      
     <div id="contenSelect">


     </div>

     <div id="contenSelect2">


</div>
      </div>

     
    </div>

<!--                                                            javascript   files   -->
		<!-- Page Wrapper -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>       
 
<script src="dist/js/indexCotizador.js"></script>

</body>
</html>


