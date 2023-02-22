<?php

namespace App\Http\Controllers;

use App\Models\Maquinista;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Renfe\services\impl\MaquinistaServiceImpl;
use Renfe\services\MaquinistaService;

class MaquinistaController extends Controller
{


    private MaquinistaService $maquinistaService;


    public function __construct(){
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
        $this->maquinistaService = new MaquinistaServiceImpl();
    }

    public function index(){
        $maquinistas = $this->maquinistaService->all();
        return response()->json($maquinistas, 200);
    }


    public function store(Request $request): Response
    {
        //
    }


    public function show(Maquinista $maquinista): Response
    {
        //
    }


    public function update(Request $request, Maquinista $maquinista): Response
    {
        //
    }


    public function destroy(Maquinista $maquinista): Response
    {
        //
    }
}
