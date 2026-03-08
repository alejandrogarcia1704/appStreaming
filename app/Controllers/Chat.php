<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\MessageModel;

class Chat extends BaseController
{

private $key="CLAVE_SECRETA_CHAT";

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

if(!session()->get('user_id'))
{
return redirect()->to('/');
}

$userModel=new UserModel();

$data['users']=$userModel
->where('id !=',session()->get('user_id'))
->findAll();

return view('chat/index',$data);

}

public function conversation($id)
{

$data['receiver']=$id;

return view('chat/conversation',$data);

}
public function sendMessage()
{

$model = new \App\Models\MessageModel();

$message = $this->request->getPost('message');

$type = 'text';
$fileName = null;

$file = $this->request->getFile('file');

if($file && $file->isValid() && !$file->hasMoved()){

$fileName = $file->getRandomName();

$file->move(FCPATH.'uploads', $fileName);

$ext = strtolower($file->getExtension());

if(in_array($ext,['jpg','jpeg','png','gif']))
$type='image';

elseif(in_array($ext,['mp4','webm']))
$type='video';

else
$type='file';

}

$model->insert([

'sender_id'=>session()->get('user_id'),
'receiver_id'=>$this->request->getPost('receiver'),
'message'=>$message,
'file'=>$fileName,
'type'=>$type

]);

return $this->response->setJSON(['status'=>'ok']);

}

public function getMessages($receiver)
{

$model=new MessageModel();

$my_id=session()->get('user_id');

$data=$model

->where("(sender_id=$my_id AND receiver_id=$receiver)")
->orWhere("(sender_id=$receiver AND receiver_id=$my_id)")
->orderBy('id','ASC')
->findAll();

return $this->response->setJSON($data);

}

}