<?php
 namespace App\Controllers;
 use App\Models\OnboardingModel;
 use CodeIgniter\RESTful\ResourceController;
 class Onboarding extends ResourceController
 {
    protected $modelName = 'App\Models\OnboardingModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $onboarding = $this->model->find($id);
        if ($onboarding) {
            return $this->respond($onboarding);
        } else {
            return $this->failNotFound('Onboarding record not found');
        }
    }
    public function create()
    {   
        $validation = \Config\Services::validation();
        $validation->setRules([
            'documents' => 'required',
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
            'status' => $this->request->getVar('status'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'documents' => $this->request->getVar('documents'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'status' => $this->request->getVar('status'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'documents' => $this->request->getVar('documents'),
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