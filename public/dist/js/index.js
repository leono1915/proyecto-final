//global variables
let dominio='http://127.0.0.1:8000/api/';
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





                           
                         
})                         



//                           FUNCTIONS GLOBALS                   */

function     listProducts(){
  /*here i make a ajax request*/
  var tableData="";
  $.ajax({
    url:dominio+'productos',
    type:'get',
    success:function(request){
        
       var element=JSON.parse(request)
          
            console.log(element.data[0].cantidad);
            element.data.forEach(dato=>{
              tableData+=`
           <tr>   <td >${dato.nombre}</td> 

            <td >${dato.medida}</td> 
             <td >${dato.espesor}</td> 
             <td >${dato.peso}</td> 
             <td >${dato.precio}</td>
             <td >${dato.cantidad}</td> 
          
             </tr>
              `
            })

         console.log(tableData)
         document.getElementById('containerTableProducts').innerHTML=tableData;
    }

   
  }
  
  )

  
}