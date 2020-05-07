//global variables
let dominio='http://127.0.0.1:8000/api/';
var element;

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
                   console.log('here')
                   $.ajax({
                       type:'get',
                       url:dominio+'clientes',
                       success:function(request){
                              console.log(request)
                       }
                   })

                   });



                           
                         
})                         



//                           FUNCTIONS GLOBALS                   */

function     listProducts(){
  /*here i make a ajax request*/
  var tableData="";
  var select="";
  var arrayNombre=[];
  var arrayMedida=[];
  var arrayEspesor=[];
  var i=0;
  $.ajax({
    url:dominio+'productos',
    type:'get',
    success:function(request){
        
      element=JSON.parse(request)
          
            //console.log(element.data[0].cantidad);
          
            element.data.forEach(dato=>{
                arrayNombre[i]=dato.nombre;
               
                //arrayEspesor[i]=dato.espesor;
              
              tableData+=`
           <tr>   <td >${dato.nombre}</td> 

            <td >${dato.medida}</td> 
             <td >${dato.espesor}</td> 
             <td >${dato.peso}</td> 
             <td >${dato.precio}</td>
             <td >${dato.cantidad}</td> 
          
             </tr>
              `
              i++;
             

            })
            var j=0;
        element.data.forEach(dato=>{
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
                <ul>  
                  <li> ${e}</li>
                </ul>
                `
            )
      
         document.getElementById('contenedorTablaCotizacion').innerHTML=tableData;
         document.getElementById('contenSelect').innerHTML=select;
    }

   
  }
  
  )

  
}

function selectMedida(){
  var medida=[];
  var nombre= document.getElementById('nombre').value;
  var select="";
  var i=0;
  element.data.forEach(dato=>{
        
  
   if(nombre===dato.nombre){
        medida[i]=dato.medida;   
   }
   select+= `
  
   <option>${medida.filter(distinto)}</option>

   `
  i++;
})
document.getElementById('medida').innerHTML=select;
}

function listarClientes(){

}