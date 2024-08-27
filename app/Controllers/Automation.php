<?php
 namespace App\Controllers;
 use App\Models\AutomationModel;
 use App\Models\BoardModel;
 use CodeIgniter\RESTful\ResourceController;
 class Automation extends ResourceController
 {
    protected $modelName = 'App\Models\AutomationModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $automation = $this->model->find($id);
        if ($automation) {
            return $this->respond($automation);
        } else {
            return $this->failNotFound('Automation not found');
        }
    }
//     public function create()
//     {
//         $data = [
//             'name' => $this->request->getVar('name'),
//             'trigger' => $this->request->getVar('trigger'),
//             'action' => $this->request->getVar('action'),
//             'board_id' => $this->request->getVar('board_id'),
//         ];

//         $this->model->save($data);
//         return $this->respondCreated($data);

// }

public function create()
{
    $validation = \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
        'trigger' => 'required',
        'action' => 'required',
        'board_id' => [
            'rules' => 'required|is_not_unique[boards.id]',
            'errors' => [
                'required' => 'The Board ID is required.',
                'is_not_unique' => 'The provided Board ID does not exist.',
            ],
        ],
    ]);

    if (!$this->validate($validation->getRules())) {
        return $this->failValidationErrors($validation->getErrors());
    }

    $data = [
        'name' => $this->request->getVar('name'),
        'trigger' => $this->request->getVar('trigger'),
        'action' => $this->request->getVar('action'),
        'board_id' => $this->request->getVar('board_id'),
    ];

    $this->model->save($data);
    return $this->respondCreated($data);
}

    
    public function update($id = null)
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'trigger' => $this->request->getVar('trigger'),
            'action' => $this->request->getVar('action'),
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