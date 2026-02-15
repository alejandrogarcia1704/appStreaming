<?php

namespace App\Controllers\Api;

use App\Models\ProductoModel;
use App\Models\ImagenModel;
use CodeIgniter\RESTful\ResourceController;

class Productos extends ResourceController
{
    protected $modelName = ProductoModel::class;
    protected $format    = 'json';

    protected ImagenModel $imagenModel;

    public function __construct()
    {
        $this->imagenModel = new ImagenModel();
    }

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $prod = $this->model->find($id);
        if (!$prod) return $this->failNotFound('Producto no encontrado');

        $imgs = $this->imagenModel
            ->where('id_producto', (int)$id)
            ->orderBy('id_imagen', 'DESC')
            ->findAll();

        $prod['imagenes'] = $imgs;

        return $this->respond($prod);
    }

    public function create()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();

        $imagenes = $payload['imagenes'] ?? [];
        unset($payload['imagenes']);

        $payload['activo'] = isset($payload['activo']) ? (int)$payload['activo'] : 1;

        if (!$this->model->insert($payload)) {
            return $this->failValidationErrors($this->model->errors());
        }

        $idProducto = (int)$this->model->getInsertID();

        if (is_array($imagenes) && count($imagenes) > 0) {
            foreach ($imagenes as $img) {
                if (!is_array($img)) continue;

                $row = [
                    'id_producto' => $idProducto,
                    'imagen'      => (string)($img['imagen'] ?? ''),
                    'activo'      => isset($img['activo']) ? (int)$img['activo'] : 1,
                ];

                if (!$this->imagenModel->insert($row)) {
                    // si falla una imagen, regresamos error (puedes cambiar a "ignorar" si quieres)
                    return $this->failValidationErrors([
                        'imagenes' => $this->imagenModel->errors(),
                    ]);
                }
            }
        }

        return $this->respondCreated([
            'message' => 'Producto creado',
            'data'    => $this->show($idProducto)->getBody() ? json_decode($this->show($idProducto)->getBody(), true) : $this->model->find($idProducto),
        ]);
    }

    public function update($id = null)
    {
        $exists = $this->model->find($id);
        if (!$exists) return $this->failNotFound('Producto no encontrado');

        $data = $this->request->getJSON(true) ?? $this->request->getRawInput();
        if (!$data) return $this->failValidationErrors('Sin datos para actualizar');

        $data['id_producto'] = (int)$id;

        if (!$this->model->save($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond([
            'message' => 'Producto actualizado',
            'data'    => $this->model->find($id),
        ]);
    }

    public function delete($id = null)
    {
        $exists = $this->model->find($id);
        if (!$exists) return $this->failNotFound('Producto no encontrado');

        // Opcional: borrar imágenes del producto
        $this->imagenModel->where('id_producto', (int)$id)->delete();

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Producto eliminado']);
    }
}
