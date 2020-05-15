

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
      <input type="text" class="form-control" id="nombre" value="" onkeyup="mayus(this);" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="nombreAgente">Nombre agente</label>
      <input type="text" class="form-control" id="nombreAgente" value="" onkeyup="mayus(this);" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="domicilio">Correo</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="espesorr">@</span>
        </div>
        <input type="text" class="form-control" id="correoCliente"  aria-describedby="inputGroupPrepend2" 
        onkeyup="mayus(this);" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
    <label for="puesto">Celular</label>
     <div class="input-group">
       <div class="input-group-prepend">
      
         <span class="input-group-text" id="pesos"></span>  
       </div>
       <input type="number" class="form-control" id="puestoCliente" aria-describedby="inputGroupPrepend2" required>
     </div>
     
    </div>
    <div class="col-md-4 mb-3">
      <label for="telefonoCliente">Teléfono</label>
      <input type="number" class="form-control" id="telefonoCliente"  aria-describedby="inputGroupPrepend2" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="rfc">Rfc</label>
      <input type="text" class="form-control" id="rfc" onkeyup="mayus(this);" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="domicilioCliente">Domicilio</label>
      <input type="text" class="form-control" id="domicilioCliente" onkeyup="mayus(this);" required>
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
  <button class="btn btn-primary" id="enviarDatosCliente">Guardar</button>
</form>
   <!--    tabla de productos segmentados     -->
   

   
      </div>
      <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tabla de Clientes</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     

          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Nombre Agente</th>
                  <th>Telefono</th>
                  <th>Rfc</th>
                  <th>Correo</th>
                  <th>Domicilio</th>
                  <th style="display:none"> </th>
                </tr>
                </thead>
                <tbody id="containerTableProductss" >
              

                @foreach ($clientes as $pro)
                 <tr id="">
                 <td style="display:none"> {{$pro->id}}</td>
                <td> {{$pro->nombre}}</td>
                <td> {{$pro->nombre_agente}}</td>
                <td> {{$pro->telefono}}</td>
                <td> {{$pro->rfc}}</td>
                <td> {{$pro->correo}}</td>
               <td>  {{$pro->domicilio}}</td>
                </tr>
                @endforeach


 

                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
     


    </div>
 
  
 
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<script src="dist/js/jquery.dataTables.js"></script>
<script src="dist/js/dataTables.bootstrap4.js"></script>
<script src="dist/js/zindex.js"></script>

  

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->



<!-- Sparkline -->

<!-- JQVMap -->

<!-- jQuery Knob Chart -->

<!-- daterangepicker -->

<!-- Tempusdominus Bootstrap 4 -->


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>


