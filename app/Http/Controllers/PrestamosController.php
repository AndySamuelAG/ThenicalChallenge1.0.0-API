<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Persona;
use App\Material;
use App\Prestamo;

class PrestamosController extends Controller {

    const MODEL = "App\Prestamo";

    use RESTActions;
    public function activos()
    {
        $prestamos = Prestamo::where('entregado', '0')->get();
        return $this->respond(Response::HTTP_OK, $prestamos);
    }

    public function dejar(Request $request){
        $data = $request->all();
        $persona = Persona::find($data['personaId']);
        if($persona->prestamoId == 0){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $prestamos = Prestamo::where('prestamoId', $persona->prestamoId)->get();

        foreach($prestamos as $prestamo){
            $prest = Prestamo::find($prestamo->id);
            $prest->entregado = 1;
            $prest->fechaRegreso = \Carbon\Carbon::now()->toDateTimeString();
            $prest->save();
            $materialId = $prest->materialId;
            $material = Material::find($materialId);
            $material->status = 'Disponible';
            $material->save();
        }
        $persona->adeudo = 0;
        $persona->libros = 0;
        $persona->prestamoId = 0;
        $persona->save();
    }

    public function llevar(Request $request){
        //personaID, materialID, biblioteca.
        $data = $request->all();
        $persona = Persona::find($data['personaId']);
        $prestamoId = Prestamo::orderBy('prestamoId', 'DESC')->first();
        $prestamoId = ($prestamoId)? $prestamoId->prestamoId : 0;
        $prestamoId += 1;
        if($persona->prestamoId != 0){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        if(is_array($data['materialId'])){
            foreach($data['materialId'] as $mater){
                $mater = Material::find($mater);
                if($mater->status == 'Ocupado'){
                    return $this->respond(Response::HTTP_NOT_FOUND);
                }
            }
        }else{
            $mater = Material::find($data['materialId']);
            if($mater->status == 'Ocupado'){
                return $this->respond(Response::HTTP_NOT_FOUND);
            }
        }
        $adeudo = 0;
        $libros = 0;
        if(is_array($data['materialId'])){
            foreach($data['materialId'] as $material){
                $materialItem = Material::find($material);
                $valor = $materialItem->precio;
                $data = array(
                    'prestamoId' => $prestamoId,
                    'personaId'=>$data['personaId'],
                    'materialId'=>$material,
                    'valor' => $valor,
                    'biblioteca'=>$data['biblioteca']
                );
                $adeudo += $valor;
                $libros++;
                $materialItem->status = 'Ocupado';
                $materialItem->save();
                $data = new Request($data);
                $this->add($data);
            }
        }else{
            $materialItem = Material::find($data['materialId']);
            $valor = $materialItem->precio;
            $data = array(
                'prestamoId' => $prestamoId,
                'personaId'=>$data['personaId'],
                'materialId'=>$data['materialId'],
                'valor' => $valor,
                'biblioteca'=>$data['biblioteca']
            );
            $data = new Request($data);
            $this->add($data);
            $materialItem->status = 'Ocupado';
            $materialItem->save();
            $adeudo = $valor;
            $libros = 1;
        }
        $persona = Persona::find($data['personaId']);
        $adeudo += $persona->adeudo;
        $persona->prestamoId = $prestamoId;
        $persona->adeudo = $adeudo;
        $persona->libros = $libros;
        $persona->save();

        return $this->respond(Response::HTTP_OK, $data);
    }
}
