<?php
 namespace App\Models;
 use CodeIgniter\Model;
class CustomFieldModel extends Model
 {
 protected $table = 'custom_fields';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'type', 'options',
 'board_id'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }