<?php
 namespace App\Controllers;
 use App\Models\ReportModel;
 use CodeIgniter\RESTful\ResourceController;
 class Report extends ResourceController
 {
    protected $modelName = 'App\Models\ReportModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $report = $this->model->find($id);
        if ($report) {
            return $this->respond($report);
        } else {
            return $this->failNotFound('Report not found');
        }
    }
    public function create()
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'type' => $this->request->getVar('type'),
            'parameters' => $this->request->getVar('parameters'),
            'generated_at' => date('Y-m-d H:i:s'),
            'file_path' => $this->request->getVar('file_path'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'type' => $this->request->getVar('type'),
            'parameters' => $this->request->getVar('parameters'),
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