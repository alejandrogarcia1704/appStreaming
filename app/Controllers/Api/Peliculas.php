<?php

namespace App\Controllers\Api;

use App\Models\PeliculaModel;
use CodeIgniter\RESTful\ResourceController;

class Peliculas extends ResourceController
{
    protected $modelName = PeliculaModel::class;
    protected $format = 'json';

    public function index()
    {
        return $this->respond(
            $this->model->orderBy('id_pelicula', 'DESC')->findAll()
        );
    }

    public function activas()
    {
        return $this->respond(
            $this->model
                ->where('activo', 1)
                ->orderBy('id_pelicula', 'DESC')
                ->findAll()
        );
    }

    public function show($id = null)
    {
        $pelicula = $this->model->find($id);

        if (!$pelicula) {
            return $this->failNotFound('Película no encontrada');
        }

        return $this->respond($pelicula);
    }

    public function create()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        $data['activo'] = 1;

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated([
            'message' => 'Película creada',
            'data' => $this->model->find($this->model->getInsertID())
        ]);
    }

    public function update($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Película no encontrada');
        }

        $data = $this->request->getJSON(true) ?? $this->request->getRawInput();

        $this->model->update($id, $data);

        return $this->respond([
            'message' => 'Película actualizada'
        ]);
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Película no encontrada');
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'message' => 'Película eliminada'
        ]);
    }

    public function activar($id = null)
    {
        $this->model->update($id, ['activo' => 1]);
        return $this->respond(['message' => 'Película activada']);
    }

    public function inactivar($id = null)
    {
        $this->model->update($id, ['activo' => 0]);
        return $this->respond(['message' => 'Película inactivada']);
    }
}