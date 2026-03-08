namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MessageModel;

class Chat extends BaseController
{

private $key="CLAVESECRETA";

private function encrypt($text)
{

$iv=openssl_random_pseudo_bytes(16);

$encrypted=openssl_encrypt($text,'AES-256-CBC',$this->key,0,$iv);

return base64_encode($encrypted.'::'.$iv);

}

private function decrypt($text)
{

list($encrypted,$iv)=explode('::',base64_decode($text),2);

return openssl_decrypt($encrypted,'AES-256-CBC',$this->key,0,$iv);

}

public function index()
{

$userModel=new UserModel();

$data['users']=$userModel->findAll();

return view('chat/index',$data);

}

public function conversation($id)
{

$data['receiver']=$id;

return view('chat/conversation',$data);

}

public function sendMessage()
{

$model=new MessageModel();

$message=$this->encrypt($this->request->getPost('message'));

$data=[

'sender_id'=>session()->get('user_id'),

'receiver_id'=>$this->request->getPost('receiver'),

'message'=>$message,

'type'=>'text'

];

$model->save($data);

}

public function getMessages($receiver)
{

$model=new MessageModel();

$sender=session()->get('user_id');

$messages=$model
->where("(sender_id=$sender AND receiver_id=$receiver) OR (sender_id=$receiver AND receiver_id=$sender)")
->findAll();

foreach($messages as &$m)
{

$m['message']=$this->decrypt($m['message']);

}

return $this->response->setJSON($messages);

}

}