<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class PublicEmployeeProfileModel extends Model
 {
 protected $table = 'public_employee_profiles';
 protected $primaryKey = 'id';
protected $allowedFields = ['employee_id', 'public_info',
 'achievements', 'certificates'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }