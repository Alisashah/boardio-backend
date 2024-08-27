<?php
 namespace App\Controllers;
 use App\Models\PayrollModel;
 use CodeIgniter\RESTful\ResourceController;
 class Payroll extends ResourceController
 {
    protected $modelName = 'App\Models\PayrollModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $payroll = $this->model->find($id);
        if ($payroll) {
            return $this->respond($payroll);
        } else {
            return $this->failNotFound('Payroll record not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'salary' => 'required',
            'status'=> 'required',
            'month'=> 'required',
            'year'=> 'required',
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
            'salary' => $this->request->getVar('salary'),
            'bonus' => $this->request->getVar('bonus'),
            'deductions' => $this->request->getVar('deductions'),
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'status' => $this->request->getVar('status'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'salary' => $this->request->getVar('salary'),
            'bonus' => $this->request->getVar('bonus'),
            'deductions' => $this->request->getVar('deductions'),
            'month'  => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
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