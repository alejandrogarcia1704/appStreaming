<?php

namespace App\Controllers\Api;

use App\Models\ClienteModel;
use CodeIgniter\RESTful\ResourceController;

class Clientes extends ResourceController
{
    protected $modelName = ClienteModel::class;
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();
        $data['activo'] = 1;

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated([
            'message' => 'Cliente creado'
        ]);
    }

    public function activar($id = null)
    {
        $this->model->update($id, ['activo' => 1]);
        return $this->respond(['message' => 'Cliente activado']);
    }

    public function inactivar($id = null)
    {
        $this->model->update($id, ['activo' => 0]);
        return $this->respond(['message' => 'Cliente inactivado']);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Cliente eliminado']);
    }
}