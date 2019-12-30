<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model {
    public $table = "Bibliotecas";

    protected $fillable = [
        'nombre'
    ];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
