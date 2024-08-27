<?php
 namespace App\Controllers;
 use App\Models\PerformanceEvaluationModel;
 use CodeIgniter\RESTful\ResourceController;
 class PerformanceEvaluation extends ResourceController
 {
    protected $modelName = 'App\Models\PerformanceEvaluationModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $evaluation = $this->model->find($id);
        if ($evaluation) {
            return $this->respond($evaluation);
        } else {
            return $this->failNotFound('Performance Evaluation not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'evaluation_period' => 'required',
            'score'=> 'required',
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
            'evaluation_period' => $this->request->getVar('evaluation_period'),
            'score' => $this->request->getVar('score'),
            'comments' => $this->request->getVar('comments'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'evaluation_period' => $this->request->getVar('evaluation_period'),
            'score' => $this->request->getVar('score'),
            'comments' => $this->request->getVar('comments'),
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