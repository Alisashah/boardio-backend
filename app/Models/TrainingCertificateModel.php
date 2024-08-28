<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class TrainingCertificateModel extends Model
 {
 protected $table = 'training_certificates';
 protected $primaryKey = 'id';
protected $allowedFields = ['employee_id', 'training_name',
 'issue_date', 'expiry_date', 'file_path'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }