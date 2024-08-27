<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class AttendanceModel extends Model
 {
 protected $table = 'attendance';
 protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'date', 'status',
 'check_in', 'check_out'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }