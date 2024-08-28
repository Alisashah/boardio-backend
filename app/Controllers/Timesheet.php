<?php
 namespace App\Controllers;
 use App\Models\TimesheetModel;
 use CodeIgniter\RESTful\ResourceController;
 class Timesheet extends ResourceController
 {
    protected $modelName = 'App\Models\TimesheetModel';
    protected $format = 'json';
    public function index()
    {
       return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $timesheet = $this->model->find($id);
        if ($timesheet) {
            return $this->respond($timesheet);
        } else {
            return $this->failNotFound('Timesheet not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'date' => 'required',
            'hours_worked'=> 'required',
            'total_hours'=> 'required',
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
            'date' => $this->request->getVar('date'),
            'hours_worked' => $this->request->getVar('hours_worked'),
            'breaks' => $this->request->getVar('breaks'),
            'total_hours' => $this->request->getVar('total_hours'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'date' => $this->request->getVar('date'),
            'hours_worked' => $this->request->getVar('hours_worked'),
            'breaks'=> $this->request->getVar('breaks'),
            'total_hours' => $this->request->getVar('total_hours'),
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