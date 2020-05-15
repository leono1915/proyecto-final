<?php

namespace App\Http\Controllers;

use App\Cotizaciontemporal;
use Illuminate\Http\Request;

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

    public function cotizacionPdf(){
        return 'echo';
    }

    public function ventaPdf(){
        return 'venta';
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
