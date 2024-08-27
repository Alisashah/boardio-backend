<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class EmployeeModel extends Model
 {
 protected $table = 'employees';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'email', 'phone',
 'department', 'position', 'photo', 'documents'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }