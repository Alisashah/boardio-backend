<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class PayrollModel extends Model
 {
 protected $table = 'payrolls';
 protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'salary', 'bonus',
 'deductions', 'month', 'year', 'status'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }