<?php
 namespace App\Controllers;
 use App\Models\LeaveModel;
 use CodeIgniter\RESTful\ResourceController;
 class Leave extends ResourceController
 {
    protected $modelName = 'App\Models\LeaveModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $leave = $this->model->find($id);
        if ($leave) {
           return $this->respond($leave);
        } else {
            return $this->failNotFound('Leave not found');
    }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'leave_type' => 'required',
            'status'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
            'employee_id' => [
                'rules' => 'required|is_not_unique[employees.id]',
                'errors' => [
                    'required' => 'The Employee ID is required.',
                    'is_not_unique' => 'The provided Employee ID does not exist.',
                ],
            ],
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
            'employee_id' => $this->request->getVar('employee_id'),
            'leave_type' => $this->request->getVar('leave_type'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'status' => $this->request->getVar('status'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'leave_type' => $this->request->getVar('leave_type'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'status' => $this->request->getVar('status'),
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