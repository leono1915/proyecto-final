//global variables
let dominio='http://127.0.0.1:8000/api/';
var element;
var arrayCotizaciones=[];

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
                     
                     var nombre  =document.getElementById('nombre').value;
                     var medida =document.getElementById('medida').value;
                     var espesor =document.getElementById('espesor').value;
                     var index=0;
                     var precio;
                     var kilos;
                      if(arrayCotizaciones.length===0){
                        arrayCotizaciones=JSON.parse(localStorage.getItem('cotizacion'));
                      }
                     element.map(e=>{
                        
                      if(e.nombre+e.medida+e.espesor=== nombre+medida+espesor){
                           index=e.id;  
                           console.log(e)
                           arrayCotizaciones.push(e);
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
                     JSON.parse(localStorage.getItem('cotizacion')).map(e=>{

                          

                         select+= `
                            <tr>
                                <td style="display:none">
                                <input type="number" class="fa-eraser"  value="${k}" min="1"/> </td>
                                <td> <input type="number" class="fa-eraser"  value="1" min="1"/> </td>
                                <td> ${e.nombre} </td>
                                <td> ${e.medida}  </td>
                                <td> ${e.espesor} </td>
                                <td> ${e.peso} </td>
                                <td> ${e.precio}  </td>
                                <td> ${e.cantidad} </td>
                                <td > <i class="far fa-trash-alt"></i></td>
                            </tr>
                         ` 
                         k++;
                        })

                        document.getElementById('contenedorTablaCotizacion1').innerHTML=select;
                

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
                     <tr >
                     <td> <input type="number" class="fa-eraser" value="${k}" min="0"/> </td>
                     <td> <input type="number" class="fa-eraser" value="" min="1"/> </td>
                     <td >${dato.nombre}</td> 
                     <td >${dato.medida}</td> 
                     <td >${dato.espesor}</td> 
                     <td >${dato.peso}</td> 
                     <td >${dato.precio}</td>
                     <td >${dato.cantidad}</td> 
              
                     <td > <i class="far fa-trash-alt"></i></td>
                     </tr>
                  ` 
                  k++;
                
                 })
              
                 document.getElementById('contenedorTablaCotizacion1').innerHTML=select;
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
  JSON.parse(localStorage.getItem('cotizacion')).map(dato=>{
  
                           

    selectTabla+= `
       <tr >
       <td style="display:none"> <input type="number" class="fa-eraser" value="${k}" min="0"/> </td>
       <td> <input type="number" class="fa-eraser" value="" min="1"/> </td>
       <td >${dato.nombre}</td> 
       <td >${dato.medida}</td> 
       <td >${dato.espesor}</td> 
       <td >${dato.peso}</td> 
       <td >${dato.precio}</td>
       <td >${dato.cantidad}</td> 

       <td > <i class="far fa-trash-alt"></i></td>
       </tr>
    ` 
    k++;
   })

   document.getElementById('contenedorTablaCotizacion1').innerHTML=selectTabla;
  
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
              console.log(select)

              i++;
         })
         document.getElementById('nombreCliente').innerHTML=select;
         

      }
     
    })
   



  }

}



function calculoDePlacas() {
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
	var descripcion = tipoPlacay[tipoPlacax].text + " DE " + id + " " + auxM1 + "x" + auxM2 + " KG " + Math.round(pesoPlacaFinal * 100) / 100;
console.log(descripcion)

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