<?php
 namespace App\Controllers;
 use App\Models\CustomFieldModel;
 use CodeIgniter\RESTful\ResourceController;
 class CustomField extends ResourceController
 {
    protected $modelName = 'App\Models\CustomFieldModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $customField = $this->model->find($id);
        if ($customField) {
            return $this->respond($customField);
        } else {
            return $this->failNotFound('Custom Field not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'type' => 'required',
            'board_id' => [
                'rules' => 'required|is_not_unique[boards.id]',
                'errors' => [
                    'required' => 'The Board ID is required.',
                    'is_not_unique' => 'The provided Board does not exist.',
                ],
            ],
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
        'name' => $this->request->getVar('name'),
        'type' => $this->request->getVar('type'),
        'options' => $this->request->getVar('options'),
        'board_id' => $this->request->getVar('board_id'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
        'name' => $this->request->getVar('name'),
        'type' => $this->request->getVar('type'),
        'options' => $this->request->getVar('options'),
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