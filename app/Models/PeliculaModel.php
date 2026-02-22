<?php

namespace App\Models;

use CodeIgniter\Model;

class PeliculaModel extends Model
{
    protected $table            = 'peliculas';
    protected $primaryKey       = 'id_pelicula';
    protected $allowedFields    = [
        'titulo',
        'descripcion',
        'genero',
        'anio',
        'duracion',
        'imagen',
        'activo'
    ];
    protected $useTimestamps = false;
}