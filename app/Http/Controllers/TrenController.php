<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrenRequest;
use App\Models\Maquinista;
use App\Models\Tren;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Renfe\DTO\TrenDTO;
use Renfe\services\impl\TrenServiceImpl;
use Renfe\services\TrenService;

class TrenController extends Controller
{
    private TrenService $trenService;

    public function __construct(){
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
        $this->trenService = new TrenServiceImpl();
    }
    public function index()
    {
        $trenes = $this->trenService->all();
        return response()->json($trenes, 200);
    }


    public function store(TrenRequest $trenRequest)
    {
        $trenDto = new TrenDTO(
            null,
            $trenRequest->name,
            $trenRequest->number,
            $trenRequest->model,
            $trenRequest->maquinista_id
        );
        return response()->json($this->trenService->save($trenDto));
    }


    public function show(int $id)
    {
        $tren = $this->trenService->findById($id);
        return response()->json($tren,200);
    }


    public function update(TrenRequest $trenRequest, Tren $tren)
    {
        $tren->name = $trenRequest->name;
        $tren->number = $trenRequest->number;
        $tren->model = $trenRequest->model;
        $tren->maquinista()->associate(Maquinista::findOrFail($trenRequest->maquinista_id));
        $tren->update();
        return response()->json($tren, 200);
    }


    public function destroy(Tren $tren)
    {
        $tren->delete();
    }

    public function getPasajeros($id){
        return response()->json(Tren::findOrFail($id)->pasajeros,200);
    }
}
