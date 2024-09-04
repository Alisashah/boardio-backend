<?php
 namespace App\Controllers;
 use App\Models\AnnouncementModel;
 use CodeIgniter\RESTful\ResourceController;
 class Announcement extends ResourceController
 {
 protected $modelName = 'App\Models\AnnouncementModel';
 protected $format
 = 'json';
 public function index()
 {
 return $this->respond($this->model->findAll());
 }
 public function show($id = null)
 {
 $announcement = $this->model->find($id);
 if ($announcement) {
 return $this->respond($announcement);
 } else {
 return $this->failNotFound('Announcement not found');
 }
 }
 public function create()
 {
 $data = [
 'title'=> $this->request->getVar('title'),
 'message'
 
 => $this->request->getVar('message'),
 'target_audience' =>
 $this->request->getVar('target_audience'),
 'created_by'
 =>
 $this->request->getVar('created_by'),
 ];
 $this->model->save($data);
return $this->respondCreated($data);
 }
 public function update($id = null)
 {
 $data = [
 'title' => $this->request->getVar('title'),
 'message'

 => $this->request->getVar('message'),
 'target_audience' =>
 $this->request->getVar('target_audience'),
 'created_by'
 =>
 $this->request->getVar('created_by'),
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