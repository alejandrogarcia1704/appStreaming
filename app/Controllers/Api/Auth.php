<?php

namespace App\Controllers\Api;

use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class Auth extends ResourceController
{
    public function login()
    {
        $model = new UsuarioModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)
                      ->where('activo', 1)
                      ->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->failUnauthorized('Credenciales incorrectas');
        }

        return $this->respond([
            'message' => 'Login exitoso',
            'user' => [
                'id' => $user['id'],
                'nombre' => $user['nombre'],
                'email' => $user['email']
            ]
        ]);
    }
}