<?php

namespace App\Http\Controllers;

use App\Models\Pasajero;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Renfe\services\impl\PasajeroServiceImpl;
use Renfe\services\PasajeroService;

class PasajeroController extends Controller
{
    private PasajeroService $pasajeroService;


    public function __construct(){
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
        $this->pasajeroService = new PasajeroServiceImpl();
    }

    public function index(){
        $pasajeros = $this->pasajeroService->all();
        return response()->json($pasajeros, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasajero $pasajero): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasajero $pasajero): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasajero $pasajero): Response
    {
        //
    }
}
