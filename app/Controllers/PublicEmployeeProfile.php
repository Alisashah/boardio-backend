<?php
 namespace App\Controllers;
 use App\Models\PublicEmployeeProfileModel;
 use CodeIgniter\RESTful\ResourceController;
 class PublicEmployeeProfile extends ResourceController
 {
    protected $modelName = 'App\Models\PublicEmployeeProfileModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $profile = $this->model->find($id);
        if ($profile) {
            return $this->respond($profile);
        } else {
            return $this->failNotFound('Public Employee Profile not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
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
            'public_info' => $this->request->getVar('public_info'),
            'achievements' => $this->request->getVar('achievements'),
            'certificates' => $this->request->getVar('certificates'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'public_info' => $this->request->getVar('public_info'),
            'achievements' =>$this->request->getVar('achievements'),
            'certificates' => $this->request->getVar('certificates'),
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