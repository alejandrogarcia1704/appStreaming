<?php

namespace App\Controllers;

use App\Models\PeliculaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Peliculas extends BaseController
{
    protected $peliculaModel;

    public function __construct()
    {
        $this->peliculaModel = new PeliculaModel();
    }

    public function index()
    {
        $data['peliculas'] = $this->peliculaModel->findAll();
        return view('peliculas/index', $data);
    }

    public function create()
    {
        return view('peliculas/create');
    }

    public function store()
    {
        $imagen = $this->request->getFile('imagen');
        $nombreImagen = null;

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombreImagen = $imagen->getRandomName();
            $imagen->move(FCPATH . 'uploads', $nombreImagen);
        }

        $this->peliculaModel->save([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'genero' => $this->request->getPost('genero'),
            'anio' => $this->request->getPost('anio'),
            'duracion' => $this->request->getPost('duracion'),
            'imagen' => $nombreImagen,
        ]);

        return redirect()->to('/peliculas');
    }

    public function edit($id)
    {
        $data['pelicula'] = $this->peliculaModel->find($id);
        return view('peliculas/edit', $data);
    }

    public function update($id)
    {
        $this->peliculaModel->update($id, [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'genero' => $this->request->getPost('genero'),
            'anio' => $this->request->getPost('anio'),
            'duracion' => $this->request->getPost('duracion'),
        ]);

        return redirect()->to('/peliculas');
    }

    public function delete($id)
    {
        $this->peliculaModel->delete($id);
        return redirect()->to('/peliculas');
    }

    public function ver($id)
    {
        $pelicula = $this->peliculaModel->find($id);

        if (!$pelicula) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('peliculas/ver', ['pelicula' => $pelicula]);
    }
}