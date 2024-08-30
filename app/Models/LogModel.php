<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class LogModel extends Model
 {
 protected $table = 'logs';
 protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'log_type',
 'timestamp'];
 protected $useTimestamps = true;
protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }