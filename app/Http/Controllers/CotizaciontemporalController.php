<?php

namespace App\Http\Controllers;

use App\Cotizaciontemporal;
use App\Clientes;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Productos;
use Illuminate\Support\Facades\Auth;
use App\Historialventas;
class CotizaciontemporalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Cotizaciontemporal::paginate(20)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
        return view('cotizacion');
    }
    public function create()
    {
        //

    }

    public function cotizacionPdf(Request $request){
        
        //$pdf=resolve::make('dompdf.wraper');
      //  $h=json_decode($array->input('array'));
      /* $ar=array();
        foreach($h as $f){
           $ar[]=array(
               'nombre' => $f->nombre,
               'medida' => $f->medida
           );
        }*/
        
     
        try{
            $folio=Historialventas::all()->last();
        }catch(\Exception $e){
            return $e->getMessage();
        }
       
        $numero= 1;
        if($folio!=null){
            $numero= $folio->numero+1;
        }
      //s  echo $numero;
        $folioFinal='C00'.$numero;
      //  foreach($request->array as $f){
        /* if(($request->array)==null){
             return 'no hay datos en la tabla';
         }*/
         /*$ventas=Historialventas::where("estatus","=","autorizado")
         ->select(DB::raw("id,folio, DATE_FORMAT(created_at,'%d/%m/%Y %h:%i %p') AS fecha"))
         ->paginate(10);;*/

         /*where("estado","=",1)
    ->whereNotNull('updated_at')
    ->whereNull('email')
    ->whereIn('id', [1, 2, 3])
    ->whereBetween('edad', [1, 30])
    ->where('username','like','%ad%')
    ->orderBy('username')
    ->orderBy('created_at','desc')
    ->skip(10)->take(5)
    ->get();*/
    
         $idCliente=$request->idCliente;
         $idUser=$request->idUser;
         $tipodescuento=$request->tipodescuento;
         try{
          
         foreach(json_decode($request->array) as $f){
            $model=new cotizaciontemporal;
          $model->cantidad=$f->cantidad;
          $model->descripcion=$f->nombre.' De '.$f->medida.' en '.$f->espesor;
          $model->precio=floatval($f->precio);
          $model->subtotal=floatval($f->precioUnitario);
          $model->iva=floatval($f->precioUnitario*.16);
          $model->total=floatval($f->importe);
          $model->id_producto=$f->index;
          $model->kilos=floatval($f->cantidadKilogramos);
          $model->cantidadDescontar=1;   
          $model->id_user=$idUser;
          $model->largo=$f->largo;
          $model->precio_kilo=$f->peso;
          $model->save();
         }
        }catch(\Exception $e){
          //  return $e->getMessage();
        }

       try{
           $cotizaciones=cotizaciontemporal::where('id_user','=',$idUser)->where('cantidadDescontar',1)->get();

          // return $cotizaciones;
        foreach(json_decode($cotizaciones) as $cotizar){
            $cotizacion= new historialventas;
           
            $cotizacion->id_cliente=$idCliente;
            $cotizacion->id_producto=$cotizar->id_producto;
            $cotizacion->folio=$folioFinal;
            $cotizacion->numero=$numero;
            $cotizacion->cantidadDescontar=$cotizar->kilos;
            $cotizacion->total=$cotizar->total;
            $cotizacion->facturado='no';
            $cotizacion->serie='pendiente';
            $cotizacion->credito='pendiente';
            $cotizacion->tipodescuento=$tipodescuento;
            $cotizacion->pago='pendiente';
            $cotizacion->id_user=$idUser;
            $cotizacion->idcotizacion=$cotizar->id;
            $cotizacion->save();
        }
       
        // $cotizaciones->each->delete();
         DB::table('cotizaciontemporals')
         ->where('id_user',$idUser)
         ->where('cantidadDescontar',1)
         ->update(['cantidadDescontar'=>0]);
       }catch(\Exception $e){
              return $e->getMessage();
       }

        
       // }
       // $data = json_decode($request->getContent());
       // dump($data);
        $rutaGuardado='cotizacion/';
        $productos=$cotizaciones;
        $observaciones=$request->modalObservaciones;
        $clientes=Clientes::where('id',$idCliente)->get();
        $pdf=PDF::loadView('pdf.cotizacion',compact('productos','clientes','folioFinal','observaciones'));
        $output=$pdf->download();
        $nombreArchivo=$folioFinal.'.pdf';
        file_put_contents( $rutaGuardado.$nombreArchivo, $output);

       
       //header('Location:http://127.0.0.1:8000/cotizar','_blanck');
        //dd($array->array);
        //return  dd($name);
        //json_decode($array->array) ;
       // return $request->array;
      // return $ventas->toJson();
      return $nombreArchivo;
    }

    public function ventaPdf(Request $request){
        //$pdf=resolve::make('dompdf.wraper');
      //  $h=json_decode($array->input('array'));
      /* $ar=array();
        foreach($h as $f){
           $ar[]=array(
               'nombre' => $f->nombre,
               'medida' => $f->medida
           );
        }*/
        try{
            $folio=Historialventas::all()->last();
        }catch(\Exception $e){
            return $e->getMessage();
        }
       
        $numero= 1;
        if($folio!=null){
            $numero= $folio->numero+1;
        }
      //s  echo $numero;
        $folioFinal='C00'.$numero;
      //  foreach($request->array as $f){
        /* if(($request->array)==null){
             return 'no hay datos en la tabla';
         }*/
        /* $ventas=Historialventas::where("estatus","=","autorizado")
         ->select(DB::raw("id,folio, DATE_FORMAT(created_at,'%d/%m/%Y %h:%i %p') AS fecha"))
         ->paginate(10);;*/

         /*where("estado","=",1)
    ->whereNotNull('updated_at')
    ->whereNull('email')
    ->whereIn('id', [1, 2, 3])
    ->whereBetween('edad', [1, 30])
    ->where('username','like','%ad%')
    ->orderBy('username')
    ->orderBy('created_at','desc')
    ->skip(10)->take(5)
    ->get();*/
    
         $idCliente=$request->idCliente;
         $idUser=$request->idUser;
         $facturado=$request->facturado;
         $serie=$request->serie;
         $credito=$request->credito;
         $tipodescuento=$request->tipodescuento;
         $pago=$request->pago;
         try{
          
         foreach(json_decode($request->array) as $f){
            $model=new cotizaciontemporal;
          $model->cantidad=$f->cantidad;
          $model->descripcion=$f->nombre.' De '.$f->medida.' en '.$f->espesor;
          $model->precio=floatval($f->precio);
          $model->subtotal=floatval($f->precioUnitario);
          $model->iva=floatval($f->precioUnitario);
          $model->total=floatval($f->importe);
          $model->id_producto=$f->index;
          $model->kilos=floatval($f->cantidadKilogramos);
          $model->cantidadDescontar=1;   
          $model->id_user=$idUser;
          $model->save();
         }
        }catch(\Exception $e){
            return $e->getMessage();
        }

       try{
           $cotizaciones=cotizaciontemporal::where('id_user','=',$idUser)->where('cantidadDescontar','=',1)
           /*->addSelect(['updated_at' => function ($query) {
            $query->select('idcotizacion')
                ->from('historialventas')
                ->whereColumn('id','!=', 'historialventas.idcotizacion');
        }])*/->get();
           
           
           //where('id_user','=',$idUser)->where('cantidadDescontar','=',1)->get();

         
        foreach(json_decode($cotizaciones) as $cotizar){
            $cotizacion= new historialventas;
           
            $cotizacion->id_cliente=$idCliente;
            $cotizacion->id_producto=$cotizar->id_producto;
            $cotizacion->folio=$folioFinal;
            $cotizacion->numero=$numero;
            $cotizacion->cantidadDescontar=$cotizar->kilos;
            $cotizacion->total=$cotizar->total;
            $cotizacion->facturado=$facturado;
            $cotizacion->serie=$serie;
            $cotizacion->credito=$credito;
            $cotizacion->tipodescuento=$tipodescuento;
            $cotizacion->pago=$pago;
            $cotizacion->id_user=$idUser;
            $cotizacion->idcotizacion=$cotizar->id;
            $cotizacion->save();
        }
       
         //$cotizaciones->each->delete();
            DB::table('cotizaciontemporals')
            ->where('id_user',$idUser)
            ->where('cantidadDescontar',1)
            ->update(['cantidadDescontar'=>0]);
       }catch(\Exception $e){
              return $e->getMessage();
       }

        return $cotizaciones;
    
    }
    public function vistaCotizacion($id){
        return view('mostrarpdf')->with('nombre',$id);
        //view('estadisticas');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request->array;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cotizaciontemporal  $cotizaciontemporal
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizaciontemporal $cotizaciontemporal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cotizaciontemporal  $cotizaciontemporal
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizaciontemporal $cotizaciontemporal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cotizaciontemporal  $cotizaciontemporal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizaciontemporal $cotizaciontemporal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cotizaciontemporal  $cotizaciontemporal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizaciontemporal $cotizaciontemporal)
    {
        //
    }
}



/*                                          consultas laravel que podrian ser utiles       
    $users = User::join("roles","users.roles_id","=","roles.id")
    ->where('users.estado','=',1)
    ->get();
 
$users = User::leftJoin("roles","users.roles_id","=","roles.id")
    ->where('users.estado','=',1)
    ->get();
 
$users = User::join("roles","users.roles_id","=","roles.id")
    ->leftJoin('posts',function($join){
        $join->on('users.posts_id','=','posts.id')->where('posts.estado','=',1);
    })
    ->where('users.estado','=',1)
    ->get();
 
$users = User::join("roles","users.roles_id","=","roles.id")
    ->leftJoin(DB::raw("(SELECT * FROM posts where posts.estado=1) as posts"),function($join){
        $join->on('users.posts_id','=','posts.id');
    })
    ->where('users.estado','=',1)
    ->get();
*/
  