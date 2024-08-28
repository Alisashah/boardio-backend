<?php
 namespace App\Controllers;
 use App\Models\EmployeeCardModel;
 use CodeIgniter\RESTful\ResourceController;
 class EmployeeCard extends ResourceController
 {
    protected $modelName = 'App\Models\EmployeeCardModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $employeeCard = $this->model->find($id);
        if ($employeeCard) {
            return $this->respond($employeeCard);
        } else {
            return $this->failNotFound('Employee Card not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'card_number' => 'required',
            'issue_date'=> 'required',
            'expiry_date'=> 'required',
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
            'card_number' => $this->request->getVar('card_number'),
            'issue_date' => $this->request->getVar('issue_date'),
            'expiry_date' => $this->request->getVar('expiry_date'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'employee_id' => $this->request->getVar('employee_id'),
            'card_number' => $this->request->getVar('card_number'),
            'issue_date' => $this->request->getVar('issue_date'),
            'expiry_date' => $this->request->getVar('expiry_date'),
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