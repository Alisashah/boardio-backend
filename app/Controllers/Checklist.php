<?php
 namespace App\Controllers;
 use App\Models\ChecklistModel;
 use CodeIgniter\RESTful\ResourceController;
 class Checklist extends ResourceController
 {
    protected $modelName = 'App\Models\ChecklistModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $checklist = $this->model->find($id);
        if ($checklist) {
            return $this->respond($checklist);
        } else {
            return $this->failNotFound('Checklist not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
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
            'name' => $this->request->getVar('name'),
            'card_id' => $this->request->getVar('card_id'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'name' => $this->request->getVar('name'),
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
