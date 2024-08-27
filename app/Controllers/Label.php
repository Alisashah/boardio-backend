<?php
namespace App\Controllers;
 use App\Models\LabelModel;
 use CodeIgniter\RESTful\ResourceController;
 class Label extends ResourceController
 {
    protected $modelName = 'App\Models\LabelModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $label = $this->model->find($id);
        if ($label) {
            return $this->respond($label);
        } else {
            return $this->failNotFound('Label not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'color' => 'required',
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
            'color' => $this->request->getVar('color'),
            'board_id' => $this->request->getVar('board_id'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
        'name' => $this->request->getVar('name'),
        'color' => $this->request->getVar('color'),
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