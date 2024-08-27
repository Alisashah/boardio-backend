<?php
 namespace App\Models;
use CodeIgniter\Model;
 class LeaveModel extends Model
 {
 protected $table = 'leaves';
 protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'leave_type',
 'start_date', 'end_date', 'status'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }