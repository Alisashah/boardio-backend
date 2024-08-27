<?php
 namespace App\Controllers;
 use App\Models\CardModel;
 use CodeIgniter\RESTful\ResourceController;
 class Card extends ResourceController
 {
    protected $modelName = 'App\Models\CardModel';
    protected $format
    = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $card = $this->model->find($id);
        if ($card) {
            return $this->respond($card);
        } else {
            return $this->failNotFound('Card not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'order' => 'required',
            'list_id' => [
                'rules' => 'required|is_not_unique[lists.id]',
                'errors' => [
                    'required' => 'The List ID is required.',
                    'is_not_unique' => 'The provided List does not exist.',
                ],
            ],
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
            'name'=> $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'list_id' => $this->request->getVar('list_id'),
            'order' => $this->request->getVar('order'),
            'due_date' => $this->request->getVar('due_date'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'order' => $this->request->getVar('order'),
            'due_date' => $this->request->getVar('due_date'),
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