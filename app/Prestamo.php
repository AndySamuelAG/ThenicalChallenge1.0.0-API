<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model {
    public $table = "Prestamos";

    protected $fillable = [
        'prestamoId',
        'personaId',
        'materialId',
        'valor',
        'biblioteca',
    ];

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'personaId');
    }

    public function material()
    {
        return $this->belongsTo('App\Material', 'materialId');
    }

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
