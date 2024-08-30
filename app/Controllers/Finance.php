<?php
 namespace App\Controllers;
 use App\Models\FinanceModel;
 use CodeIgniter\RESTful\ResourceController;
 class Finance extends ResourceController
 {
    protected $modelName = 'App\Models\FinanceModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $finance = $this->model->find($id);
        if ($finance) {
            return $this->respond($finance);
        } else {
            return $this->failNotFound('Finance record not found');
        }
    }
    public function create()
    {
        $data = [
            'type' => $this->request->getVar('type'),
            'amount' => $this->request->getVar('amount'),
            'description' => $this->request->getVar('description'),
            'date' => $this->request->getVar('date'),
            'category' => $this->request->getVar('category'),
            'created_by' => $this->request->getVar('created_by'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'type' => $this->request->getVar('type'),
            'amount' => $this->request->getVar('amount'),
            'description' => $this->request->getVar('description'),
            'date' => $this->request->getVar('date'),
            'category' => $this->request->getVar('category'),
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