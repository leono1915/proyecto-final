<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('productos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
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
       try{ 
           $model=new Productos;
           $model->nombre=$request->nombre;
           $model->medida=$request->medida;
           $model->espesor=$request->espesor;
           $model->peso=$request->peso;
           $model->precio=$request->precio;
           $model->cantidad=$request->cantidad;
            /*Productos::create($request->all());
            Productos::save();*/
            //return $request->all();
          
          
              $model->save();
            return ['success'=>'producto guardado exitosamente'];
          }catch(\Exception $e){

            return $e=['success'=>'no se pudo guardar verifique sus datos'];
            /* redirect()->route('productos.index')
                            ->with('success','Product created successfully.');*/
        
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
        return $productos::paginate(5)->toJson();
    }
    public function showProduct($id)
    {
        //
        return Productos::findOrfail($id)->toJson();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        //
           $productos=new Productos;
           $productos->nombre=$request->nombre;
           $productos->medida=$request->medida;
           $productos->espesor=$request->espesor;
           $productos->peso=$request->peso;
           $productos->precio=$request->precio;
           $productos->cantidad=$request->cantidad;
           
           return ['success'=>'exito'];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }
}
