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

$model=new UserModel();

$data=[
'name'=>$this->request->getPost('name'),
'email'=>$this->request->getPost('email'),
'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT)
];

$model->save($data);

return redirect()->to('/');
}

public function login()
{

$session=session();
$model=new UserModel();

$email=$this->request->getPost('email');
$password=$this->request->getPost('password');

$user=$model->where('email',$email)->first();

if($user && password_verify($password,$user['password']))
{

$session->set('user_id',$user['id']);

return redirect()->to('/chat');

}

return "Error login";

}

}