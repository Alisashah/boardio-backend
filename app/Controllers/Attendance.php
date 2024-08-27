<?php
 namespace App\Controllers;
 use App\Models\AttendanceModel;
 use CodeIgniter\RESTful\ResourceController;
 class Attendance extends ResourceController
 {
    protected $modelName = 'App\Models\AttendanceModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $attendance = $this->model->find($id);
        if ($attendance) {
            return $this->respond($attendance);
        } else {
            return $this->failNotFound('Attendance record not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'date' => 'required',
            'status'=> 'required',
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
            'date'=> $this->request->getVar('date'),
            'status' => $this->request->getVar('status'),
            'check_in' => $this->request->getVar('check_in'),
            'check_out' => $this->request->getVar('check_out'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'status' => $this->request->getVar('status'),
            'check_in' => $this->request->getVar('check_in'),
            'check_out' => $this->request->getVar('check_out'),
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