<?php
namespace App\Controllers;
use App\Models\BoardModel;
use CodeIgniter\RESTful\ResourceController;
class Board extends ResourceController
{
    protected $modelName = 'App\Models\BoardModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $board = $this->model->find($id);
        if ($board) {
            return $this->respond($board);
        } else {
            return $this->failNotFound('Board not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'description' => 'required',
            'created_by' => [
                'rules' => 'required|is_not_unique[users.id]',
                'errors' => [
                    'required' => 'The User ID is required.',
                    'is_not_unique' => 'The provided User does not exist.',
                ],
            ],
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'created_by' => $this->request->getVar('created_by'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
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