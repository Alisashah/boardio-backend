<?php
 namespace App\Controllers;
 use App\Models\FormModel;
 use CodeIgniter\RESTful\ResourceController;
 class Form extends ResourceController
{
    protected $modelName = 'App\Models\FormModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $form = $this->model->find($id);
        if ($form) {
            return $this->respond($form);
        } else {
            return $this->failNotFound('Form not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'description' => 'required',
            'created_by' => [
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
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'fields' => $this->request->getVar('fields'),
            'created_by' => $this->request->getVar('created_by'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'fields'=> $this->request->getVar('fields'),
            'created_by' => $this->request->getVar('created_by'),
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