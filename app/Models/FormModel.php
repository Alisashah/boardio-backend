<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class FormModel extends Model
 {
 protected $table = 'forms';
 protected $primaryKey = 'id';
 protected $allowedFields = ['title', 'description', 'fields',
 'created_by'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }