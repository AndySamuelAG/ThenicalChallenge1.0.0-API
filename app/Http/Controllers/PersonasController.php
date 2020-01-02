<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Persona;
use App\Material;
use App\Prestamo;

class PersonasController extends Controller {

    const MODEL = "App\Persona";
    use RESTActions;

    public function fromBiblioteca($id){
        $model = Persona::where('biblioteca', $id)->get();
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        return $this->respond(Response::HTTP_OK, $model);
    }
    public function fromBibliotecaTipo($id, $tipo){
        $model = Persona::where('tipo', $tipo)->where('biblioteca', $id)->get();
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        return $this->respond(Response::HTTP_OK, $model);
    }
}
