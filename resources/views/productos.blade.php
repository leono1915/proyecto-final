

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizador</title>
   <!-- <link rel="stylesheet" href="{{asset('dist/css/main.css')}}" />-->
   <link rel="stylesheet" href="{{asset('dist/css/aside.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
	<script>

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
     
    </ul>
  </nav>
  <!-- /.navbar -->

  @extends('layouts.aside')
    <div class="content-wrapper">
      <div class="container">
      <form>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="medida">Medida</label>
      <input type="text" class="form-control" id="medida" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="espesor">Espesor</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="espesorr">1/1</span>
        </div>
        <input type="text" class="form-control" id="espesor"  aria-describedby="inputGroupPrepend2" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
    <label for="peso">Peso</label>
     <div class="input-group">
       <div class="input-group-prepend">
      
         <span class="input-group-text" id="pesos">KG</span>  
       </div>
       <input type="number" class="form-control" id="peso" aria-describedby="inputGroupPrepend2" required>
     </div>
     
    </div>
    <div class="col-md-4 mb-3">
      <label for="precio">Precio</label>
      <input type="number" class="form-control" id="precio"  aria-describedby="inputGroupPrepend2" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="kilosTotales">Kilos Totales</label>
      <input type="number" class="form-control" id="kilosTotales" required>
    </div>
  </div>
  <div class="form-group">
    <!--<div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>-->
  </div>
  <button class="btn btn-primary" id="enviarDatosProducto">Guardar</button>
</form>
      </div>

      <div  class="card-header text-center">
       <table class="table">
      <thead>
      <tr>
      <th>Nombre</th>
       <th>Medida</th>
       <th>Espesor</th>
       <th>Peso</th>
       <th>Precio</th>
       <th>Kilos Totales</th>
      </tr>
      </thead>
       <tbody  id='containerTableProducts'>
       
       
       </tbody>
       </table>
     

      </div>


    </div>

  
 
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/index.js"></script>


  
  <script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->



<!-- Sparkline -->

<!-- JQVMap -->

<!-- jQuery Knob Chart -->

<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
</body>
</html>


