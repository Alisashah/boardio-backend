<?php
 namespace App\Controllers;
 use App\Models\SuperAdminModel;
 use CodeIgniter\RESTful\ResourceController;
 class SuperAdmin extends ResourceController
 {
 protected $modelName = 'App\Models\SuperAdminModel';
 protected $format
 = 'json';
 public function index()
 {
 return $this->respond($this->model->findAll());
 }
public function show($id = null)
 {
 $superadmin = $this->model->find($id);
 if ($superadmin) {
 return $this->respond($superadmin);
 } else {
 return $this->failNotFound('Super Admin not found');
 }
 }
 public function create()
 {
 $data = [
 'name'=> $this->request->getVar('name'),
 'email'
 
 => $this->request->getVar('email'),
 'password' =>
 password_hash($this->request->getVar('password'),
 PASSWORD_DEFAULT),
 ];
 $this->model->save($data);
 return $this->respondCreated($data);
 }
 public function update($id = null)
 {
 $data = [
 'name' => $this->request->getVar('name'),
 'email'

 => $this->request->getVar('email'),
 'password' =>
 password_hash($this->request->getVar('password'),
 PASSWORD_DEFAULT),
 ];
 $this->model->update($id, $data);
 return $this->respond($data);
 }
 public function delete($id = null)
 {
 $this->model->delete($id);
 return $this->respondDeleted(['id' => $id]);
 }
 public function resetPassword($id = null)
 {
 $password =
 password_hash($this->request->getVar('password'),
 PASSWORD_DEFAULT);
 $this->model->update($id, ['password' => $password]);
 return $this->respond(['message' => 'Password reset
 successfully']);
 }
 public function loginAsUser($id = null)
 {
 // Implement logic to login as another user
 }
}