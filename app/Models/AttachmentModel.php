<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class AttachmentModel extends Model
 {
 protected $table = 'attachments';
 protected $primaryKey = 'id';
 protected $allowedFields = ['filename', 'file_path',
 'card_id'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }