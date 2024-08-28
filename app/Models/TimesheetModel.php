<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class TimesheetModel extends Model
 {
 protected $table = 'timesheets';
 protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'date',
 'hours_worked', 'breaks', 'total_hours'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }