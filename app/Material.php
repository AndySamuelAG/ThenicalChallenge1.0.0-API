<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model {
    public $table = "Materiales";

    protected $fillable = [
        'tipo',
        'codigo',
        'autor',
        'titulo',
        'anio',
        'status',
        'precio',
        'editorial',
        'biblioteca',
        ];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
