<?php

namespace App\Controllers;

use App\Models\ClienteModel;

class Clientes extends BaseController
{
    public function index()
    {
        $model = new ClienteModel();
        $clientes = $model->findAll();

        return view('clientes/index', [
            'clientes' => $clientes
        ]);
    }

    public function create()
    {
        return view('clientes/create');
    }

    public function store()
    {
        $model = new ClienteModel();

        $model->save([
            'nombre' => $this->request->getPost('nombre'),
            'apellido_paterno' => $this->request->getPost('apellido_paterno'),
            'apellido_materno' => $this->request->getPost('apellido_materno'),
            'correo' => $this->request->getPost('correo'),
            'activo' => 1
        ]);

        return redirect()->to(base_url('clientes'));
    }

    public function edit($id)
    {
        $model = new ClienteModel();
        $cliente = $model->find($id);

        if (!$cliente) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('clientes/edit', [
            'cliente' => $cliente
        ]);
    }

    public function update($id)
    {
        $model = new ClienteModel();

        $model->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'apellido_paterno' => $this->request->getPost('apellido_paterno'),
            'apellido_materno' => $this->request->getPost('apellido_materno'),
            'correo' => $this->request->getPost('correo'),
        ]);

        return redirect()->to(base_url('clientes'));
    }

    public function toggle($id)
    {
        $model = new ClienteModel();
        $cliente = $model->find($id);

        if (!$cliente) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $nuevoEstado = $cliente['activo'] ? 0 : 1;

        $model->update($id, [
            'activo' => $nuevoEstado
        ]);

        return redirect()->to(base_url('clientes'));
    }

    public function delete($id)
    {
        $model = new ClienteModel();
        $model->delete($id);

        return redirect()->to(base_url('clientes'));
    }
}