<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Upload extends BaseController
{

public function uploadFile()
{

$file=$this->request->getFile('file');

if($file->isValid())
{

$name=$file->getRandomName();

$file->move('uploads',$name);

return $this->response->setJSON([

'file'=>$name

]);

}

}

}