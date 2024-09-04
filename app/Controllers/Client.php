<?php
 namespace App\Controllers;
 use App\Models\ClientModel;
 use CodeIgniter\RESTful\ResourceController;
 class Client extends ResourceController
 {
 protected $modelName = 'App\Models\ClientModel';
 protected $format
 = 'json';
 public function index()
 {
return $this->respond($this->model->findAll());
 }
 public function show($id = null)
 {
 $client = $this->model->find($id);
 if ($client) {
 return $this->respond($client);
 } else {
 return $this->failNotFound('Client not found');
 }
 }
 public function create()
 {
 $data = [
 'name' => $this->request->getVar('name'),
 'email' => $this->request->getVar('email'),
 'phone'=> $this->request->getVar('phone'),
 'company' => $this->request->getVar('company'),
 'address' => $this->request->getVar('address'),
 'notes'
 => $this->request->getVar('notes'),
 ];
 $this->model->save($data);
 return $this->respondCreated($data);
 }
 public function update($id = null)
 {
 $data = [
 'name'=> $this->request->getVar('name'),
 'email'=> $this->request->getVar('email'),
 'phone'=> $this->request->getVar('phone'),
 'company' => $this->request->getVar('company'),
 'address' => $this->request->getVar('address'),
 'notes'
 => $this->request->getVar('notes'),
 ];
 $this->model->update($id, $data);
 return $this->respond($data);
 }
 public function delete($id = null)
 {
 $this->model->delete($id);
 return $this->respondDeleted(['id' => $id]);
 }
 }