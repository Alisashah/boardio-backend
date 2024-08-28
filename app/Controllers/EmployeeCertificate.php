<?php
 namespace App\Controllers;
 use App\Models\EmployeeCertificateModel;
 use CodeIgniter\RESTful\ResourceController;
 class EmployeeCertificate extends ResourceController
 {
    protected $modelName = 'App\Models\EmployeeCertificateModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $certificate = $this->model->find($id);
        if ($certificate) {
            return $this->respond($certificate);
        } else {
            return $this->failNotFound('Employee Certificate not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'certificate_type' => 'required',
            'month'=> 'required',
            'year'=> 'required',
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
            'certificate_type' => $this->request->getVar('certificate_type'),
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'file_path' => $this->request->getVar('file_path'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'employee_id' => $this->request->getVar('employee_id'),
            'certificate_type' => $this->request->getVar('certificate_type'),
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'), 
            'file_path' => $this->request->getVar('file_path'),
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