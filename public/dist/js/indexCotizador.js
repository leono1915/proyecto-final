//global variables
let dominio='http://127.0.0.1:8000/api/';
let dominioWeb='http://127.0.0.1:8000/';
var element;
var arrayCotizaciones=[{
     index:'',cantidad:'',nombre:'',medida:'',espesor:'',peso:'',largo:'',cantidadKilogramos:'',precioUnitario:'',importe:''
     ,precio
}];
const  factorTramo=(1/6.1);
const iva=.16;
//const function to filter repeats
const distinto = (valor, indice, self) => {
    return self.indexOf(valor) === indice;
}
$(function () {

  'use strict'
  /*here call to global functions*/
  listProducts();
  
  
 

  

           /*                SEND DATA PRODUCTS AT CREATE                                    */
                           $('#enviarDatosProducto').on('click',function (){
                             console.log("click")
                             var nombre= document.getElementById('nombre').value;
                             var medida= document.getElementById('medida').value;
                             var espesor=document.getElementById('espesor').value;
                             var peso=   document.getElementById('peso').value;
                             var precio= document.getElementById('precio').value;
                             var cantidad=document.getElementById('kilosTotales').value;
                             //document.getElementById('kilosTotales').value;
                             console.log(nombre,medida,espesor)

                             
                             $.ajax({
                                 url:dominio+'productos',
                                 type:'post',
                                 data:{nombre,
                                   medida,
                                   espesor,
                                   peso,
                                   precio,
                                   cantidad},
                                success:function(respuesta){
                                    alert(respuesta.success);
                                }
                             })
                       
                           });

                   // ajax request
                 
                   $('#click').on('click',function(){
                     
                     var tramos  =document.getElementById('tramos').value;
                     var metros  =document.getElementById('metros').value;
                     var nombre  =document.getElementById('nombre').value;
                     var medida =document.getElementById('medida').value;
                     var espesor =document.getElementById('espesor').value;
                     var cantidad,largo,cantidadKilogramos,precioUnitario,importe;
                     var costoPerdida=.16;
                     var costoMetros,costoTramos;
                     console.log(tramos+" aa "+metros)
			//var cantidadDescontar=parseInt(cantidad)+(parseFloat(metros) * factorTramo);
		               	 var subtotalMetros;
                     var index=0;
                     var precio;
                     var kilos;
                      if(arrayCotizaciones===null||arrayCotizaciones.length===0){
                        if(JSON.parse(localStorage.getItem('cotizacion'))===null){
                               arrayCotizaciones=[
                       // index:'',cantidad:'',nombre:'',medida:'',espesor:'',largo:'',cantidadKilogramos:'',precioUnitario:'',importe:''
                           ];
                        }
                        else{
                        arrayCotizaciones=JSON.parse(localStorage.getItem('cotizacion'));
                        }
                        console.log(arrayCotizaciones)
                      }
                     element.map(e=>{
                        
                      if(e.nombre+e.medida+e.espesor=== nombre+medida+espesor){
                           index=e.id;  
                         //  console.log(e)
                           cantidad=1;
                           costoMetros = ((parseFloat(metros) * (factorTramo)) * parseFloat(e.peso)) * parseFloat(e.precio);
                           subtotalMetros = costoMetros * costoPerdida;
                           costoMetros += subtotalMetros;
                           var peso=e.peso;
                           costoTramos= parseFloat(tramos*e.peso*e.precio);
                           cantidadKilogramos=Math.round((e.peso*parseFloat(parseFloat(tramos)+(metros*factorTramo)))*100)/100;
                           precioUnitario=Math.round((costoTramos+costoMetros)*100)/100;
                           precio=precioUnitario;
                           importe=Math.round((precioUnitario+(precioUnitario*iva))*100)/100;
                           arrayCotizaciones.push({index,cantidad,nombre,medida,espesor, largo,peso,cantidadKilogramos,precioUnitario,importe
                          ,precio});
                           console.log(arrayCotizaciones)
                      }
                     
                     })

                     if(index===0){
                       alert('El producto no existe')
                       return;
                     }
                   

                     localStorage.setItem('cotizacion',JSON.stringify(arrayCotizaciones));
                     var select="";
                     var k=0;
                     //console.log(localStorage.getItem('cotizacion'))
                     JSON.parse(localStorage.getItem('cotizacion')).map(dato=>{

                          

                         select+= `
                            <tr>
                                <td style="display:none">
                                <input type="number" class="fa-eraser"  value="${k}" min="1"/> </td>
                                <td> <input type="number" class="fa-eraser calcularCantidad"  value="1" min="1"/> </td>

                                <td >${"pzas"}</td> 
                                <td >${dato.nombre+" de "+dato.medida+" en "+dato.espesor}</td> 
                               
                               
                                <td > ${dato.peso} </td>
                                <td > ${dato.cantidadKilogramos}  </td>
                                <td name="subtotal[]"> ${dato.precioUnitario} </td>
                                <td name="total[]"> ${dato.importe} </td>
                                <td > <i class="far fa-trash-alt"></i></td>
                            </tr>
                         ` 
                         k++;
                        })

                        document.getElementById('contenedorTablaCotizacion1').innerHTML=select;
                        calculateTotalsBySumColumn();

                   });
            //      end function   cotizar
            //     function cotizar placa

             $('#cotizarPlaca').on('click',calculoDePlacas);


            $("body").on('click', ".fa-trash-alt",function(){
                var a = this.parentNode.parentNode;
               var posicion=a.getElementsByTagName('td')[0].getElementsByTagName('input')[0].value;
               arrayCotizaciones.splice(posicion,1);
                localStorage.setItem('cotizacion',JSON.stringify(arrayCotizaciones));
                console.log(a.getElementsByTagName('td')[0].getElementsByTagName('input')[0].value)
                //console.log(a.getElementsByTagName('td')[1].getElementsByTagName('input')[0].value)
                $(this).parent().parent().fadeOut("fast", function () { $(this).remove(); });
                var k=0;
                var select="";
                JSON.parse(localStorage.getItem('cotizacion')).map(dato=>{
  
                           

                  select+= `
                  <tr>
                  <td style="display:none">
                  <input type="number" class="fa-eraser"  value="${k}" min="1"/> </td>
                  <td> <input type="number" class="fa-eraser calcularCantidad"  value="${dato.cantidad}" min="1"/> </td>

                  <td >${"pzas"}</td> 
                  <td >${dato.nombre+" de "+dato.medida+" en "+dato.espesor}</td> 
                 
                
                  <td > ${dato.peso} </td>
                  <td > ${dato.cantidadKilogramos} </td>
                  <td name="subtotal[]"> ${dato.precioUnitario} </td>
                  <td name="total[]"> ${dato.importe} </td>
                  <td > <i class="far fa-trash-alt"></i></td>
              </tr>
                  ` 
                  k++;
                
                 })
              
                 document.getElementById('contenedorTablaCotizacion1').innerHTML=select;
                 calculateTotalsBySumColumn();
              })

              $('#limpiarTabla').on('click',function(){{
             localStorage.clear();
             arrayCotizaciones=[];
                 document.getElementById('contenedorTablaCotizacion1').innerHTML="";
                  
	document.getElementById("total_subtotales").innerHTML = 0.0


	document.getElementById("total_impuesto").innerHTML =0.0

	
	document.getElementById("total_total").innerHTML = 0.0
	document.getElementById("descuento").innerHTML = 0.0;
              }})
                                      //                     funcion descuentos


              $('#descuentos').on('click',calculateTotalsBySumColumnDescuento);


              //      funcion limpiar descuentos                     
              $('#limpiarDescuento').on('click',calculateTotalsBySumColumn);

              $("body").on('click', ".calcularCantidad",calcularNuevaCantidad);
                  
              $('#agregarConcepto').on('click',agregarConcepto);
              $('#cotizacion').on('click',function(){
                 
               var array2=  `[{
                        nombre:'perro',
                        medida:'perra',
                        espesor:'maldio'
                 },
                 {
                  nombre:'perro',
                  medida:'perra',
                  espesor:'maldio'
           },
           {
            nombre:'perro',
            medida:'perra',
            espesor:'maldio'
     }
               
                ]`
                 
                var array= localStorage.getItem('cotizacion');
                var idCliente=document.getElementById('nombreCliente').value;
                var idUser=document.getElementById('userId').value;
                 $.ajax({
                   url:dominio+'cotizaciones',
                   type: 'POST',
                  // dataType:'json',
                 //  contentType: 'json',
                   data:{array,idUser,idCliente},
                  // contentType: 'application/json; charset=utf-8',
                   success:function(request){
                       console.log(request)
                   }
                 })

              })


              /*  $('#cotizacion').on('click',function(event){
                     event.preventDefault();

                     console.log("formulario funciona");

                })*/



                           
                         
})                         



//                           FUNCTIONS GLOBALS                   */

function     listProducts(){
  /*here i make a ajax request*/
  var tableData="";
  var select="<option>Nombre </option>";
  var selectTabla="";
  var arrayNombre=[];
  var arrayMedida=[];
  var arrayEspesor=[];
  var i=0;
  var k=0;
  $.ajax({
    url:dominio+'productos',
    type:'get',
    success:function(request){
    
      element=JSON.parse(request)
          
            
          
            element.forEach(dato=>{
                arrayNombre[i]=dato.nombre;
               
                //arrayEspesor[i]=dato.espesor;
              
              tableData+=`
           <tr>  
             <td> <input type="number"  value="" min="1"/> </td>
             <td >${dato.nombre}</td> 
             <td >${dato.medida}</td> 
             <td >${dato.espesor}</td> 
             <td >${dato.peso}</td> 
             <td >${dato.precio}</td>
             <td >${dato.cantidad}</td> 
             <td > <i class="far fa-trash-alt">aa</i></td>
             </tr>
              `
              i++;
             

            })
            var j=0;
        element.forEach(dato=>{
               if(dato.nombre===arrayNombre[j]){
                arrayMedida[i]=dato.nombre+dato.medida;
               }
                if(dato.nombre===arrayNombre[j]){
                       arrayEspesor[i]=dato.espesor;
               }
             j++;
        })


 

  let arrayFiltroNombre=arrayNombre.filter(distinto);
         //console.log(element.data)
        
            arrayFiltroNombre.map(e=>
                select+=`
                <option>${e}</option>
                `
            )
      
        // document.getElementById('contenedorTablaCotizacion').innerHTML=tableData;
         document.getElementById('nombre').innerHTML=select;
    }

   
  }
  
  )
  
   arrayCotizaciones=JSON.parse(localStorage.getItem('cotizacion'));
  if( JSON.parse(localStorage.getItem('cotizacion'))!==null||JSON.parse(localStorage.getItem('cotizacion'))>0){
    JSON.parse(localStorage.getItem('cotizacion')).map(dato=>{
  
                           

      selectTabla+= `
      <tr>
      <td style="display:none">
      <input type="number" class="fa-eraser"  value="${k}" min="1"/> </td>
      <td> <input type="number" class="fa-eraser calcularCantidad"  value="${dato.cantidad}" min="1"/> </td>

      <td >${"pzas"}</td> 
      <td >${dato.nombre+" de "+dato.medida+" en "+dato.espesor}</td> 
     
    
      <td > ${dato.peso} </td>
      <td > ${dato.cantidadKilogramos} </td>
      <td name="subtotal[]"> ${Math.round(dato.precioUnitario*100)/100} </td>
      <td name="total[]"> ${Math.round(dato.importe*100)/100} </td>
      <td > <i class="far fa-trash-alt"></i></td>
  </tr>
      ` 
      k++;
     })
  }

   document.getElementById('contenedorTablaCotizacion1').innerHTML=selectTabla;
   calculateTotalsBySumColumn();
}

function selectMedida(){
  var medida=[];
  var aux;
  var nombre= document.getElementById('nombre').value;
  var select="<option>Medida </option>";
  var i=0;
  element.forEach(dato=>{
    
  
   if(nombre===dato.nombre){
        
       medida[i]=dato.medida;
          
      
   }
  
  i++;
})

      medida.filter(distinto).forEach(dato=>{
        select+= `
  
        <option>${dato} </option>
        
        `
      }) 

document.getElementById('medida').innerHTML=select;
}





 function selectEspesor(){

  var espesor=[];

  var nombre= document.getElementById('nombre').value;
  var medida= document.getElementById('medida').value;
  var select="<option>Espesor </option>";
  var i=0;
  element.forEach(dato=>{
    
  
   if(nombre+medida===dato.nombre+dato.medida){
        
       espesor[i]=dato.espesor;
          
      
   }
  
  i++;
})

      espesor.filter(distinto).forEach(dato=>{
        select+= `
  
        <option>${dato} </option>
        
        `
      }) 

document.getElementById('espesor').innerHTML=select;


}


function listarClientes(){
  var nombre =document.getElementById('nombreInput').value;
  var element;
  var select="";
  var i=0;
  var nombreAux=[];
  console.log(22)
  if(nombre.length>3){
     
    $.ajax({
      url:dominio+'clientes/coincidencia',
      type:'post',
      data:{nombre},
      success:function(request){
      
        element=JSON.parse(request);
         element.forEach(dato=>{

        
          if((dato.nombre.length===0)){
           nombreAux[i]=dato.nombre_agente;
          }else{
            nombreAux[i]=dato.nombre;
          }
              select+=`
              <option value=${dato.id}> ${nombreAux[i]} </option>
              `
             // console.log(select)

              i++;
         })
         document.getElementById('nombreCliente').innerHTML=select;
         

      }
     
    })
   



  }

}



function calculoDePlacas() {
  var index=250;
	var pulgadas;
	var unidadMedida;
	var check=document.getElementById('pulgadas');
	if(check.checked==true){
		pulgadas=check.value;
		unidadMedida='"';
	}else{
		pulgadas=1;
		unidadMedida='';
	}
	const pi = 3.141596, iva = .16;
	var auxiliarCorteBrida = 0;
	var auxiliarCorte = 0;
	var auxiliarPeso = 1;
	var constantePesoPlaca = $("input[name='gender']:checked").val();
	var auxM1=document.getElementById('medida1').value+unidadMedida;
	var auxM2=document.getElementById('medida2').value+unidadMedida;
	var medida1 = parseFloat(document.getElementById('medida1').value)*pulgadas;
	var medida2 = parseFloat(document.getElementById('medida2').value)*pulgadas;
	var precioCorte = parseFloat(document.getElementById('precioCorte').value);
	var precio = parseFloat(document.getElementById('precio').value);
	var medidaBrida = parseFloat(document.getElementById('medidaBrida').value)*pulgadas;
	var total, subtotal, impuesto;
	var tipoPlacax = document.getElementById('selectionNamePlaca').selectedIndex;
	var tipoPlacay = document.getElementById('selectionNamePlaca').options;

	if (isNaN(medidaBrida)) {
		if (tipoPlacay[tipoPlacax].text == 'Brida') {
			alert('se necesita un diametro interior para calcular la brida');
			return;
		}
		medidaBrida = 0;


	}


	if (tipoPlacay[tipoPlacax].text == 'Disco') {
		auxiliarCorte = ((medida1 * pi) / 2.54) * precioCorte;
	}
	if (tipoPlacay[tipoPlacax].text == 'Cartabon') {
		auxiliarPeso = 2;
		auxiliarCorte = ((medida1 + medida2) / 2.54) * precioCorte;
	}
	if (tipoPlacay[tipoPlacax].text == 'Brida') {

		auxiliarCorteBrida = (medidaBrida * pi) * precioCorte;
		auxiliarCorte = ((medida1 * pi) / 2.54) * precioCorte;
	}
	var precioCorteFinal = (((medida1 + medida2) / 2.54) * precioCorte) + auxiliarCorte + auxiliarCorteBrida;
	var pesoPlacaFinal = (medida1 * medida2 * constantePesoPlaca) / auxiliarPeso;
	var precioPlaca = precio * pesoPlacaFinal;
	subtotal = precioPlaca + precioCorteFinal;
	impuesto = subtotal * iva;
	total = impuesto + subtotal;
  var id = $("input[name='gender']:checked").parent().find('.spana').text();
  element.map(e=>{
    if(e.espesor==id){
    
      console.log(index)
    }
  })
  var nombre = tipoPlacay[tipoPlacax].text;
  var medida=   auxM1 + "x" + auxM2 + ""
  var espesor=  id;
  var cantidad=1;
  


if (validacion()) {
  document.getElementById('txtPesoPlaca').value = Math.round(pesoPlacaFinal * 100) / 100;
  document.getElementById('txtCortePlaca').value = Math.round(precioCorteFinal * 100) / 100;
  document.getElementById('txtSubTotalPlaca').value = Math.round(subtotal * 100) / 100;
  document.getElementById('txtIvaPlaca').value = Math.round(impuesto * 100) / 100;
  document.getElementById('txtTotalPlaca').value = Math.round(total * 100) / 100;
}
		
		/*tablaParametros(1,descripcion,an= Math.round(subtotal * 100) / 100 ,
		subtotal1= Math.round(subtotal * 100) / 100 ,iva1=Math.round(impuesto * 100) / 100,total1= Math.round(total* 100) / 100,
		accion='<span ">    </span><span class="icon fa-eraser"></span>',250,1,0,0);
		calculateTotals(subtotal, subtotal, impuesto, total, 1);*/
  //}
  var largo="N/A";
  var cantidadKilogramos=pesoPlacaFinal;
  var peso=pesoPlacaFinal;
  var precioUnitario=subtotal,precio=subtotal,importe=total;
  arrayCotizaciones.push({index,cantidad,nombre,medida,espesor,largo,peso,cantidadKilogramos
,precioUnitario,precio,importe})
var selectTabla="";
var k=0;
arrayCotizaciones.map(dato=>{
  selectTabla+= `
  <tr>
  <td style="display:none">
  <input type="number" class="fa-eraser"  value="${k}" min="1"/> </td>
  <td> <input type="number" class="fa-eraser calcularCantidad"  value="${dato.cantidad}" min="1"/> </td>

  <td >${"pzas"}</td> 
  <td >${dato.nombre+" de "+dato.medida+" en "+dato.espesor}</td> 
 
 

  <td > ${dato.peso} </td>
  <td > ${dato.cantidadKilogramos} </td>
  <td name="subtotal[]"> ${Math.round(dato.precioUnitario*100)/100} </td>
  <td name="total[]"> ${Math.round(dato.importe*100)/100} </td>
  <td > <i class="far fa-trash-alt"></i></td>
</tr>
  ` 
  k++;
  localStorage.setItem('cotizacion',JSON.stringify(arrayCotizaciones));

document.getElementById('contenedorTablaCotizacion1').innerHTML=selectTabla;

 })
 calculateTotalsBySumColumn();     
}

function validacion() {
	var constantePesoPlaca = $("input[name='gender']:checked").val();
	var medida1 = parseFloat(document.getElementById('medida1').value);
	var medida2 = parseFloat(document.getElementById('medida2').value);
	var precioCorte = parseFloat(document.getElementById('precioCorte').value);
  var precio = parseFloat(document.getElementById('precio').value);
  console.log(precioCorte)
	if (constantePesoPlaca == null || isNaN(medida1) || isNaN(medida2) || isNaN(precioCorte) || isNaN(precio)) {
    alert('debe llenar los campos requeridos');
    console.log(medida1,medida2,precio,precioCorte)
		return false;
	} else {
		return true;
	}
}



function calculateTotalsBySumColumn() {

	var total_precios = 0;
	
	var array_precios = document.getElementsByName("total[]");
	for (var i = 0; i < array_precios.length; i++) {
		total_precios += parseFloat(array_precios[i].innerHTML);
	}
	document.getElementById("total_precio").innerHTML = Math.round(total_precios * 100) / 100;


	var subtotales = 0;
	var array_subtotales = document.getElementsByName("subtotal[]");
	for (var i = 0; i < array_subtotales.length; i++) {
		subtotales += parseFloat(array_subtotales[i].innerHTML);
  }
  
	document.getElementById("total_subtotales").innerHTML = Math.round(subtotales * 100) / 100;


	document.getElementById("total_impuesto").innerHTML = Math.round((subtotales*iva) * 100) / 100;

	
	document.getElementById("total_total").innerHTML = Math.round(total_precios * 100) / 100;
	document.getElementById("descuento").innerHTML = 0.0;
}
function calculateTotalsBySumColumnDescuento() {
	var total_precios = 0;
	var porcentajeDescuento=document.getElementById('opcionAdescontar').value;
    console.log(porcentajeDescuento)
		var total_precios = 0;
	
	var array_precios = document.getElementsByName("total[]");
	for (var i = 0; i < array_precios.length; i++) {
		total_precios += parseFloat(array_precios[i].innerHTML);
	}
	document.getElementById("total_precio").innerHTML = Math.round(total_precios * 100) / 100;


	var subtotales = 0;
	var array_subtotales = document.getElementsByName("subtotal[]");
	for (var i = 0; i < array_subtotales.length; i++) {
		subtotales += parseFloat(array_subtotales[i].innerHTML);
  }
  
	document.getElementById("total_subtotales").innerHTML = Math.round(subtotales * 100) / 100;


	document.getElementById("total_impuesto").innerHTML = Math.round((subtotales*iva) * 100) / 100;

	
	//document.getElementById("total_total").innerHTML = Math.round(total_precios * 100) / 100;
  var descuento = (subtotales *porcentajeDescuento);
	document.getElementById("descuento").innerHTML = Math.round(descuento * 100) / 100;
	document.getElementById("total_total").innerHTML = Math.round((total_precios - descuento) * 100) / 100;

}

function calcularNuevaCantidad(){
    
   var a= this.parentNode.parentNode;
   var selectTabla="";
   var k=0;
   var nuevaCantidad,nuevo;
   var cantidad= parseInt(a.getElementsByTagName('td')[1].getElementsByTagName('input')[0].value);
   var posicion= a.getElementsByTagName('td')[0].getElementsByTagName('input')[0].value;
   console.log(cantidad);
   nuevaCantidad=cantidad*parseFloat(arrayCotizaciones[posicion].precio);
   nuevo=cantidad*parseFloat(arrayCotizaciones[posicion].precio*1.16);
   console.log(nuevo,nuevaCantidad)
   arrayCotizaciones[posicion].cantidad=cantidad;
   arrayCotizaciones[posicion].precioUnitario=nuevaCantidad;
   arrayCotizaciones[posicion].importe=nuevo;
  /* var start = new Date().getTime();
	for (var i = 0; i < 1e7; i++) {
	 if ((new Date().getTime() - start) > 1000) {
	  break;
	 }
	}*/
   arrayCotizaciones.map(dato=>{
    selectTabla+= `
    <tr>
    <td style="display:none">
    <input type="number" class="fa-eraser"  value="${k}" min="1"/> </td>
    <td> <input type="number" class="fa-eraser calcularCantidad"  value="${dato.cantidad}" min="1"/> </td>

    <td >${"pzas"}</td> 
    <td >${dato.nombre+" de "+dato.medida+" en "+dato.espesor}</td> 
   
   
    <td > ${dato.peso} </td>
    <td > ${dato.cantidadKilogramos} </td>
    <td name="subtotal[]"> ${Math.round(dato.precioUnitario*100)/100} </td>
    <td name="total[]"> ${Math.round(dato.importe*100)/100} </td>
    <td > <i class="far fa-trash-alt"></i></td>
</tr>
    ` 
    k++;
    localStorage.setItem('cotizacion',JSON.stringify(arrayCotizaciones));

 document.getElementById('contenedorTablaCotizacion1').innerHTML=selectTabla;
 
   })
   calculateTotalsBySumColumn();
   

}

function agregarConcepto(){
  var cantidad = parseInt(document.getElementById('cantidadConcepto').value);
	var nombre = document.getElementById('nombreConcepto').value;
	var medida = document.getElementById('medidaConcepto').value;
	var espesor = document.getElementById('espesorConcepto').value;
	var precio = parseFloat(document.getElementById('precioConcepto').value);
	var bandera = false;
//	var descripcion = nombre + " " + medida + " " + espesor;
	if (cantidad != 1) {
		alert('por defecto la cantidad es uno, puede modificarla en la caja de incremento');

	}
	else if (nombre.length < 2 || medida.length < 1 || espesor.length < 1) {
		alert('debe ingresar datos validos');
	}
	else if (isNaN(precio)) {
		alert('el precio no es valido');
	}
	else {
		bandera = true;
	}
	if (bandera) {
		var subtotal = cantidad * parseFloat(precio);
		var impuesto = parseFloat(subtotal) * 0.16;
		var total_n = parseFloat(subtotal) + parseFloat(impuesto);
    
	 var index=0;
   var largo='N/A';	
   var peso='N/A';
   var precioUnitario=subtotal;
   var importe=total_n;
   var cantidadKilogramos='N/A';
    arrayCotizaciones.push({index,cantidad,nombre,medida,espesor,largo,peso,cantidadKilogramos
      ,precioUnitario,precio,importe})
      var selectTabla="";
      var k=0;
      arrayCotizaciones.map(dato=>{
        selectTabla+= `
        <tr>
        <td style="display:none">
        <input type="number" class="fa-eraser"  value="${k}" min="1"/> </td>
        <td> <input type="number" class="fa-eraser calcularCantidad"  value="${dato.cantidad}" min="1"/> </td>
      
        <td >${"pzas"}</td> 
        <td >${dato.nombre+" de "+dato.medida+" en "+dato.espesor}</td> 
       
      
        <td > ${dato.peso} </td>
        <td > ${dato.cantidadKilogramos} </td>
        <td name="subtotal[]"> ${Math.round(dato.precioUnitario*100)/100} </td>
        <td name="total[]"> ${Math.round(dato.importe*100)/100} </td>
        <td > <i class="far fa-trash-alt"></i></td>
      </tr>
        ` 
        k++;
        localStorage.setItem('cotizacion',JSON.stringify(arrayCotizaciones));
      
      document.getElementById('contenedorTablaCotizacion1').innerHTML=selectTabla;
      
       })
       calculateTotalsBySumColumn(); 
	}

}