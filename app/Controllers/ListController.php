<?php
 namespace App\Controllers;
 use App\Models\ListModel;
 use CodeIgniter\RESTful\ResourceController;
 
 class ListController extends ResourceController
 {
    protected $modelName = 'App\Models\ListModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $list = $this->model->find($id);
        if ($list) {
            return $this->respond($list);
        } else {
            return $this->failNotFound('List not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'order' => 'required',
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
            'board_id' => $this->request->getVar('board_id'),
            'order' => $this->request->getVar('order'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'order' => $this->request->getVar('order'),
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