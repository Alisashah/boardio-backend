<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class EmployeeCertificateModel extends Model
 {
 protected $table = 'employee_certificates';
 protected $primaryKey = 'id';
 protected $allowedFields = ['employee_id', 'certificate_type',
 'month', 'year', 'file_path'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }