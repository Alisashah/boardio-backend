<?php
 namespace App\Controllers;
 use App\Models\EmployeeModel;
 use App\Models\SubscriptionModel;
 use CodeIgniter\RESTful\ResourceController;
 class SelfServicePortal extends ResourceController
 {
    protected $employeeModel;
    protected $subscriptionModel;
    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
        $this->subscriptionModel = new SubscriptionModel();
    }
    public function getDashboard($employee_id = null)
    {
        $employee = $this->employeeModel->find($employee_id);
    if (!$employee) {
        return $this->failNotFound('Employee not found');
    }

    $tenant_id = $employee['tenant_id'] ?? null;
    if (!$tenant_id) {
        return $this->fail('Invalid tenant ID');
    }

    $subscription = $this->subscriptionModel->where('tenant_id', $tenant_id)->first();
    if (!$subscription) {
        return $this->failNotFound('Subscription not found');
    }

    return $this->respond([
        'employee' => $employee,
        'subscription' => $subscription,
    ]);
        // $employee = $this->employeeModel->find($employee_id);
        // $subscription = $this->subscriptionModel->where('id',
        // $employee['tenant_id'])->first();
        // return $this->respond([
        //     'employee' => $employee,
        //     'subscription' => $subscription,
        // ]);
    }
    public function updateProfile($employee_id = null)
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'department' => $this->request->getVar('department'),
            'position' => $this->request->getVar('position'),
            'photo' => $this->request->getVar('photo'),
            'documents' => $this->request->getVar('documents'),
        ];
        $this->employeeModel->update($employee_id, $data);
        return $this->respond($data);
    }
    public function manageBilling($tenant_id = null)
    {
        $subscription = $this->subscriptionModel->where('tenant_id', $tenant_id)->first();
        $data = [
            'plan_name' => $this->request->getVar('plan_name'),
            'price' => $this->request->getVar('price'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'status' => $this->request->getVar('status'),
    ];
        $this->subscriptionModel->update($subscription['id'], $data);
        return $this->respond($data);
    }
 }
