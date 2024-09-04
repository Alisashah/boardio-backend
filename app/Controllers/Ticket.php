<?php
 namespace App\Controllers;
 use App\Models\TicketModel;
 use CodeIgniter\RESTful\ResourceController;
 class Ticket extends ResourceController
 {
 protected $modelName = 'App\Models\TicketModel';
 protected $format
 = 'json';
 public function index()
 {
 return $this->respond($this->model->findAll());
 }
 public function show($id = null)
 {
 $ticket = $this->model->find($id);
 if ($ticket) {
 return $this->respond($ticket);
 } else {
 return $this->failNotFound('Ticket not found');
 }
 }
 public function create()
 {
    $validation = \Config\Services::validation();
    $validation->setRules([
        'title' => 'required',
        'description' => 'required',
        'status' => 'required',
        'type' => 'required',
        'priority' => 'required',
        'assigned_to' => 'required',
        'created_by' => 'required',
        'user_id' => [
            'rules' => 'required|is_not_unique[users.id]',
            'errors' => [
                'required' => 'The User ID is required.',
                'is_not_unique' => 'The provided User does not exist.',
            ],
        ],
    ]);

    if (!$this->validate($validation->getRules())) {
        return $this->failValidationErrors($validation->getErrors());
    }
 $data = [
 'user_id'=> $this->request->getVar('user_id'),
 'title'=> $this->request->getVar('title'),
'description' => $this->request->getVar('description'),
 'status' => $this->request->getVar('status'),
 'type' => $this->request->getVar('type'),
 'priority'=> $this->request->getVar('priority'),
 'created_by' => $this->request->getVar('created_by'),
 'assigned_to' => $this->request->getVar('assigned_to'),
 ];
 $this->model->save($data);
 return $this->respondCreated($data);
 }
 public function update($id = null)
 {
 $data = [
 'title'
 => $this->request->getVar('title'),
 'description' => $this->request->getVar('description'),
 'status'=> $this->request->getVar('status'),
 'type'=> $this->request->getVar('type'),
 'priority'=> $this->request->getVar('priority'),
 'assigned_to' => $this->request->getVar('assigned_to'),
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