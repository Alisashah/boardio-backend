<?php
 namespace App\Controllers;
 use App\Models\DueDateModel;
 use CodeIgniter\RESTful\ResourceController;
 class DueDate extends ResourceController
 {
    protected $modelName = 'App\Models\DueDateModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $dueDate = $this->model->find($id);
        if ($dueDate) {
            return $this->respond($dueDate);
        } else {
            return $this->failNotFound('Due Date not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'due_date' => 'required',
            'card_id' => [
                'rules' => 'required|is_not_unique[cards.id]',
                'errors' => [
                    'required' => 'The Card ID is required.',
                    'is_not_unique' => 'The provided Card does not exist.',
                ],
            ],
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
            'due_date' => $this->request->getVar('due_date'),
            'reminder' => $this->request->getVar('reminder'),
            'card_id' => $this->request->getVar('card_id'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'due_date' => $this->request->getVar('due_date'),
            'reminder' => $this->request->getVar('reminder'),
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