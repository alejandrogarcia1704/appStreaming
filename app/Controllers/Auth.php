<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{

public function loginView()
{
    return view('auth/login');
}

public function registerView()
{
    return view('auth/register');
}

public function register()
{

$model = new UserModel();

$data = [
'name' => $this->request->getPost('name'),
'email' => $this->request->getPost('email'),
'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
];

$model->save($data);

return redirect()->to('/');

}

public function login()
{

$session = session();
$model = new UserModel();

$email = $this->request->getPost('email');
$password = $this->request->getPost('password');

$user = $model->where('email', $email)->first();

if ($user && password_verify($password, $user['password']))
{

$session->set([
'user_id' => $user['id'],
'user_name' => $user['name']
]);

return redirect()->to('/chat');

}

return view('auth/login', [
'error' => 'Correo o contraseña incorrectos'
]);

}

public function logout()
{

session()->destroy();

return redirect()->to('/');

}

public function forgotView()
{
return view('auth/forgot');
}

public function forgotPassword()
{

$email = $this->request->getPost('email');

return "Aquí iría el envío del correo de recuperación para: ".$email;

}

}