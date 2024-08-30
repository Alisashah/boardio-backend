<?php
 namespace App\Controllers;
 use App\Models\LogModel;
 use CodeIgniter\RESTful\ResourceController;
 class Log extends ResourceController
 {
    protected $modelName = 'App\Models\LogModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $log = $this->model->find($id);
        if ($log) {
            return $this->respond($log);
        } else {
            return $this->failNotFound('Log not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'log_type' => 'required',
            'timestamp'=> 'required',
            'employee_id' => [
                'rules' => 'required|is_not_unique[employees.id]',
                'errors' => [
                    'required' => 'The Employee ID is required.',
                    'is_not_unique' => 'The provided Employee does not exist.',
                ],
            ],
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
            'employee_id' => $this->request->getVar('employee_id'),
            'log_type' => $this->request->getVar('log_type'),
            'timestamp' => $this->request->getVar('timestamp'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'log_type' => $this->request->getVar('log_type'),
            'timestamp' => $this->request->getVar('timestamp'),
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