<?php
 namespace App\Controllers;
 use App\Models\EmployeeModel;
 use CodeIgniter\RESTful\ResourceController;
 class Employee extends ResourceController
 {
    protected $modelName = 'App\Models\EmployeeModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $employee = $this->model->find($id);
        if ($employee) {
            return $this->respond($employee);
        } else {
            return $this->failNotFound('Employee not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[employees.email]',
            'phone' => 'required|is_unique[employees.phone]',
            'department' => 'required',
            'position' => 'required',
           
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
            'name'=> $this->request->getVar('name'),
            'email'=> $this->request->getVar('email'),
            'phone'=> $this->request->getVar('phone'),
            'department' => $this->request->getVar('department'),
            'position' => $this->request->getVar('position'),
            'photo'=> $this->request->getVar('photo'),
            'documents' => $this->request->getVar('documents'),
            'linkedin' => $this->request->getVar('linkedin'),
            'facebook' => $this->request->getVar('facebook'),
            'instagram' => $this->request->getVar('instagram'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
        {
        $data = [
            'name' => $this->request->getVar('name'),
            'email'=> $this->request->getVar('email'),
            'phone'=> $this->request->getVar('phone'),
            'department' => $this->request->getVar('department'),
            'position' => $this->request->getVar('position'),
            'photo'
            => $this->request->getVar('photo'),
            'documents' => $this->request->getVar('documents'),
            'linkedin' => $this->request->getVar('linkedin'),
            'facebook' => $this->request->getVar('facebook'),
            'instagram' => $this->request->getVar('instagram'),
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