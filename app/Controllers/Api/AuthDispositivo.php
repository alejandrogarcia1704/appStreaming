<?php

namespace App\Controllers\Api;

use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class AuthDispositivo extends ResourceController
{
    protected $format = 'json';

    public function deviceLogin()
    {
        $usuarioModel = new UsuarioModel();

        $mac = (string)$this->request->getHeaderLine('X-MAC-Address');

        if (!$mac) {
            $payload = $this->request->getJSON(true) ?? $this->request->getPost();
            $mac = (string)($payload['direccion_mac'] ?? '');
        }

        $mac = strtoupper(trim($mac));
        $mac = str_replace('-', ':', $mac);

        if (!preg_match('/^([0-9A-F]{2}:){5}[0-9A-F]{2}$/', $mac)) {
            return $this->failValidationErrors('MAC inválida. Formato esperado: AA:BB:CC:DD:EE:FF');
        }

        $user = $usuarioModel->where('direccion_mac', $mac)->first();

        if ($user) {
            if ((int)($user['activo'] ?? 0) !== 1) {
                return $this->fail('Usuario inactivo.', 403);
            }

            session()->regenerate();
            session()->set([
                'isLoggedIn' => true,
                'usuario' => [
                    'id_usuario'    => (int)$user['id_usuario'],
                    'usuario'       => (string)$user['usuario'],
                    'rol'           => (string)$user['rol'],
                    'direccion_mac' => $user['direccion_mac'] ?? null,
                ],
            ]);

            return $this->respond([
                'message' => 'Login por dispositivo OK',
                'data' => [
                    'id_usuario'    => (int)$user['id_usuario'],
                    'usuario'       => (string)$user['usuario'],
                    'rol'           => (string)$user['rol'],
                    'direccion_mac' => $user['direccion_mac'],
                ],
            ]);
        }
        $username = 'cli_' . substr(sha1($mac), 0, 10);
        $rawPass = bin2hex(random_bytes(8));
        $hash    = password_hash($rawPass, PASSWORD_DEFAULT);

        $newData = [
            'usuario'        => $username,
            'password'       => $hash,
            'rol'            => 'cliente',
            'direccion_mac'  => $mac,
            'activo'         => 1,
            'fecha_creacion' => date('Y-m-d H:i:s'),
        ];

        if (!$usuarioModel->insert($newData)) {
            return $this->failValidationErrors($usuarioModel->errors());
        }

        $id = (int)$usuarioModel->getInsertID();
        $created = $usuarioModel->find($id);

        session()->regenerate();
        session()->set([
            'isLoggedIn' => true,
            'usuario' => [
                'id_usuario'    => (int)$created['id_usuario'],
                'usuario'       => (string)$created['usuario'],
                'rol'           => (string)$created['rol'],
                'direccion_mac' => $created['direccion_mac'] ?? null,
            ],
        ]);

        return $this->respondCreated([
            'message' => 'Usuario creado automáticamente por MAC',
            'data' => [
                'id_usuario'    => (int)$created['id_usuario'],
                'usuario'       => (string)$created['usuario'],
                'rol'           => (string)$created['rol'],
                'direccion_mac' => (string)$created['direccion_mac'],
            ],
        ]);
    }
}
