<?php
 namespace App\Controllers;
 use App\Models\AttachmentModel;
 use CodeIgniter\RESTful\ResourceController;
 class Attachment extends ResourceController
 {
    protected $modelName = 'App\Models\AttachmentModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function show($id = null)
    {
        $attachment = $this->model->find($id);
        if ($attachment) {
            return $this->respond($attachment);
        } else {
            return $this->failNotFound('Attachment not found');
        }
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'filename' => 'required',
            'card_id' => [
                'rules' => 'required|is_not_unique[cards.id]',
                'errors' => [
                    'required' => 'The Card ID is required.',
                    'is_not_unique' => 'The provided Card ID does not exist.',
                ],
            ],
        ]);
    
        if (!$this->validate($validation->getRules())) {
            return $this->failValidationErrors($validation->getErrors());
        }
    
        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = $file->store();
            $data = [
                'filename' => $file->getClientName(),
                'file_path' => $filePath,
                'card_id' => $this->request->getVar('card_id'),
            ];
            $this->model->save($data);
            return $this->respondCreated($data);
        } else {
            return $this->fail('Failed to upload file');
        }
    }
    public function delete($id = null)
    {
        $attachment = $this->model->find($id);
        if ($attachment) {
            unlink(WRITEPATH . 'uploads/' .
            $attachment['file_path']);
            $this->model->delete($id);
            return $this->respondDeleted(['id' => $id]);
        } else {
            return $this->failNotFound('Attachment not found');
        }
    }
 }