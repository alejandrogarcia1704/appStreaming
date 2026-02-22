<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $peliculaModel = new \App\Models\PeliculaModel();

        $peliculas = $peliculaModel->orderBy('id_pelicula', 'DESC')->findAll();

        return view('Inicio/inicio', [
            'peliculas' => $peliculas
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function enrique(): string
    {
        return view('EnriquePortafolio/iniE');
    }
    
    public function brandon(): string
    {
        return view('BrandonPortafolio/iniB');
    }
    
    public function julio(): string
    {
        return view('JulioPortafolio/iniA');
    }
}