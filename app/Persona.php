<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {
    public $table = "Personas";

    protected $fillable = [
        'tipo',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'numPersona',
        'biblioteca'
    ];

    protected $dates = [];

    public function prestamo()
    {
        return $this->hasMany('App\Prestamo', 'prestamoId');
    }

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
