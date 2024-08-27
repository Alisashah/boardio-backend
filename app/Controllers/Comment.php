<?php
 namespace App\Controllers;
 use App\Models\CommentModel;
 use CodeIgniter\RESTful\ResourceController;
 class Comment extends ResourceController
 {
    protected $modelName = 'App\Models\CommentModel';
    protected $format
    = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $comment = $this->model->find($id);
        if ($comment) {
            return $this->respond($comment);
        } else {
            return $this->failNotFound('Comment not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'content' => 'required',
            'user_id' => [
                'rules' => 'required|is_not_unique[users.id]',
                'errors' => [
                    'required' => 'The User ID is required.',
                    'is_not_unique' => 'The provided User does not exist.',
                ],
            ],
                'card_id' => [
                    'rules' => 'required|is_not_unique[cards.id]',
                    'errors' => [
                        'required' => 'The Card ID is required.',
                        'is_not_unique' => 'The provided Card does not exist.',
                    ],    
            ],
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $data = [
            'content' => $this->request->getVar('content'),
            'user_id' => $this->request->getVar('user_id'),
            'card_id' => $this->request->getVar('card_id'),
        ];
        $this->model->save($data);
        return $this->respondCreated($data);
    }
    public function update($id = null)
    {
        $data = [
            'content' => $this->request->getVar('content'),
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