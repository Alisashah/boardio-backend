<?php
namespace App\Controllers;
 use App\Models\SubscriptionModel;
 use CodeIgniter\RESTful\ResourceController;
 class Subscription extends ResourceController
 {
    protected $modelName = 'App\Models\SubscriptionModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $subscription = $this->model->find($id);
        if ($subscription) {
            return $this->respond($subscription);
        } else {
            return $this->failNotFound('Subscription not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tenant_id' => 'required',
            'plan_name'=> 'required',
            'price'=> 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
        'tenant_id' => $this->request->getVar('tenant_id'),
        'plan_name' => $this->request->getVar('plan_name'),
        'price' => $this->request->getVar('price'),
        'start_date' => $this->request->getVar('start_date'),
        'end_date' => $this->request->getVar('end_date'),
        'status' => $this->request->getVar('status'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'plan_name' => $this->request->getVar('plan_name'),
            'price' => $this->request->getVar('price'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
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