<?php
 namespace App\Controllers;
 use App\Models\BrandingModel;
 use CodeIgniter\RESTful\ResourceController;
 class Branding extends ResourceController
 {
    protected $modelName = 'App\Models\BrandingModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $branding = $this->model->find($id);
        if ($branding) {
            return $this->respond($branding);
        } else {
            return $this->failNotFound('Branding not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tenant_id' => 'required',
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
            'tenant_id' => $this->request->getVar('tenant_id'),
            'logo' => $this->request->getVar('logo'),
            'primary_color' => $this->request->getVar('primary_color'),
            'secondary_color' => $this->request->getVar('secondary_color'),
            'theme' => $this->request->getVar('theme'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'tenant_id' => $this->request->getVar('tenant_id'),
            'logo' => $this->request->getVar('logo'),
            'primary_color' => $this->request->getVar('primary_color'),
            'secondary_color' => $this->request->getVar('secondary_color'),
            'theme' => $this->request->getVar('theme'),
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