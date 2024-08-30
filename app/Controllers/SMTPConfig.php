<?php
 namespace App\Controllers;
 use CodeIgniter\RESTful\ResourceController;
 class SMTPConfig extends ResourceController
 {
 protected $format = 'json';
 public function index()
 {
 $config = [
 'SMTPHost' => getenv('SMTPHost'),
 'SMTPPort' => getenv('SMTPPort'),
 'SMTPUser' => getenv('SMTPUser'),
 'SMTPPass' => getenv('SMTPPass'),
 'SMTPAuth' => getenv('SMTPAuth'),
 'SMTPSecure' => getenv('SMTPSecure'),
 ];
 return $this->respond($config);
 }
public function update($id = null)
 {
 $config = [
 'SMTPHost' => $this->request->getVar('SMTPHost'),
 'SMTPPort' => $this->request->getVar('SMTPPort'),
 'SMTPUser' => $this->request->getVar('SMTPUser'),
 'SMTPPass' => $this->request->getVar('SMTPPass'),
 'SMTPAuth' => $this->request->getVar('SMTPAuth'),
 'SMTPSecure' => $this->request->getVar('SMTPSecure'),
 ];
 // Save the config to environment file or database as needed
 foreach ($config as $key => $value) {
    putenv("$key=$value");
    }
    return $this->respond($config);
 }
 }